<?php

namespace App\Http\Controllers\Resource;

use App\Components\Image\Creator;
use App\Components\Image\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Resource\EditImageRequest;
use App\Http\Requests\Resource\StoreImageRequest;
use App\Models\Image;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Resource\DetailImageTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('image');
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
            ->render('admin.pages.image', compact('config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreImageRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreImageRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Image $image
     * @param EditImageRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(Image $image, EditImageRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($image, $request) {
            $status = (new Editor($request))->edit($image);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Image $image
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Image $image, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($image, $request) {
            $status = $image->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Image $image
     * @return JsonResponse|mixed
     */
    public function detail(Image $image): mixed
    {
        return $this->withComponentErrorHandling(function () use ($image) {

            return fractal()
                ->item($image)
                ->transformWith(new DetailImageTransformer())
                ->respond();
        });
    }
}
