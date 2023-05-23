<?php

namespace App\Http\Controllers\Order;

use App\Components\OrderDetail\Creator;
use App\Components\OrderDetail\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\EditOrderDetailRequest;
use App\Http\Requests\Order\StoreOrderDetailRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shipping;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Order\DetailOrderDetailTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('order_detail');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {
        list($instance, $filter, $editor, $modal_size, $create) = $this->buildInstance($request);

        $options = Product::pluck('name', 'id');

        $config = [
            "placeholder" => "Select multiple options..",
            "allowClear" => true
        ];
        return (new $instance)
            ->render('admin.pages.order_detail', compact('options', 'config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreOrderDetailRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreOrderDetailRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param OrderDetail $orderDetail
     * @param EditOrderDetailRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(Order $orderDetail, EditOrderDetailRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($orderDetail, $request) {
            $status = (new Editor($request))->edit($orderDetail);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param OrderDetail $orderDetail
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(OrderDetail $orderDetail, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($orderDetail, $request) {
            $status = $orderDetail->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param OrderDetail $orderDetail
     * @return JsonResponse|mixed
     */
    public function detail(OrderDetail $orderDetail): mixed
    {
        return $this->withComponentErrorHandling(function () use ($orderDetail) {

            return fractal()
                ->item($orderDetail)
                ->transformWith(new DetailOrderDetailTransformer())
                ->respond();
        });
    }
}
