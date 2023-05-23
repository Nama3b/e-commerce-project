<?php

namespace App\Http\Controllers\Delivery;

use App\Components\Delivery\Creator;
use App\Components\Delivery\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery\EditDeliveryRequest;
use App\Http\Requests\Delivery\StoreDeliveryRequest;
use App\Models\Delivery;
use App\Models\Member;
use App\Models\PaymentOption;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Delivery\DetailDeliveryTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('delivery');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {
        list($instance, $filter, $editor, $modal_size, $create) = $this->buildInstance($request);

        $option1 = Member::pluck('name', 'id');
        $option2 = PaymentOption::pluck('name', 'id');

        $config = [
            "placeholder" => "Select multiple options..",
            "allowClear" => true
        ];
        return (new $instance)
            ->render('admin.pages.delivery', compact('option1', 'option2', 'config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreDeliveryRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreDeliveryRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Delivery $delivery
     * @param EditDeliveryRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(Delivery $delivery, EditDeliveryRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($delivery, $request) {
            $status = (new Editor($request))->edit($delivery);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Delivery $delivery
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Delivery $delivery, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($delivery, $request) {
            $status = $delivery->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Delivery $delivery
     * @return JsonResponse|mixed
     */
    public function detail(Delivery $delivery): mixed
    {
        return $this->withComponentErrorHandling(function () use ($delivery) {

            return fractal()
                ->item($delivery)
                ->transformWith(new DetailDeliveryTransformer())
                ->respond();
        });
    }
}
