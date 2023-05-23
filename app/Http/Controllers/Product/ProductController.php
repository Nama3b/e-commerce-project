<?php

namespace App\Http\Controllers\Product;

use App\Components\Product\Creator;
use App\Components\Product\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\EditProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Product\DetailProductTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('product');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {
        list($instance, $filter, $editor, $modal_size, $create) = $this->buildInstance($request);

        $config = [
            "placeholder" => "Select multiple options..",
            "allowClear" => true
        ];

        return (new $instance)
            ->render('admin.pages.product', compact('config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreProductRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreProductRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Product $product
     * @param EditProductRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(Product $product, EditProductRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($product, $request) {
            $status = (new Editor($request))->edit($product);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Product $product, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($product, $request) {
            $status = $product->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Product $product
     * @return JsonResponse|mixed
     */
    public function detail(Product $product): mixed
    {
        return $this->withComponentErrorHandling(function () use ($product) {

            return fractal()
                ->item($product)
                ->transformWith(new DetailProductTransformer())
                ->respond();
        });
    }
}
