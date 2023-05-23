<?php

namespace App\Http\Controllers\Product;

use App\Components\ProductCategory\Creator;
use App\Components\ProductCategory\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\EditProductCategoryRequest;
use App\Http\Requests\Product\StoreProductCategoryRequest;
use App\Models\Member;
use App\Models\PaymentOption;
use App\Models\ProductCategory;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Product\DetailProductCategoryTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('product_category');
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
            ->render('admin.pages.product_category', compact('config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreProductCategoryRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreProductCategoryRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param ProductCategory $productCategory
     * @param EditProductCategoryRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(ProductCategory $productCategory, EditProductCategoryRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($productCategory, $request) {
            $status = (new Editor($request))->edit($productCategory);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param ProductCategory $productCategory
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(ProductCategory $productCategory, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($productCategory, $request) {
            $status = $productCategory->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param ProductCategory $productCategory
     * @return JsonResponse|mixed
     */
    public function detail(ProductCategory $productCategory): mixed
    {
        return $this->withComponentErrorHandling(function () use ($productCategory) {

            return fractal()
                ->item($productCategory)
                ->transformWith(new DetailProductCategoryTransformer())
                ->respond();
        });
    }
}
