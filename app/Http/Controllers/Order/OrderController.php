<?php

namespace App\Http\Controllers\Order;

use App\Components\Order\Creator;
use App\Components\Order\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\EditOrderRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Shipping;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Order\DetailOrderTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('order');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {
        list($instance, $filter, $editor, $modal_size, $create) = $this->buildInstance($request);

        $options = Customer::pluck('full_name', 'id');

        $config = [
            "placeholder" => "Select multiple options..",
            "allowClear" => true
        ];
        return (new $instance)
            ->render('admin.pages.order', compact('options', 'config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreOrderRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreOrderRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Order $order
     * @param EditOrderRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(Order $order, EditOrderRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($order, $request) {
            $status = (new Editor($request))->edit($order);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Order $order, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($order, $request) {
            $status = $order->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Order $order
     * @return JsonResponse|mixed
     */
    public function detail(Order $order): mixed
    {
        return $this->withComponentErrorHandling(function () use ($order) {

            return fractal()
                ->item($order)
                ->transformWith(new DetailOrderTransformer())
                ->respond();
        });
    }
}
