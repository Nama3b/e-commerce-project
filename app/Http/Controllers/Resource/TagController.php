<?php

namespace App\Http\Controllers\Resource;

use App\Components\Tag\Creator;
use App\Components\Tag\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Resource\EditTagRequest;
use App\Http\Requests\Resource\StoreTagRequest;
use App\Models\Tag;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Resource\DetailTagTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('tag');
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
            ->render('admin.pages.tag', compact('config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreTagRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreTagRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Tag $tag
     * @param EditTagRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(Tag $tag, EditTagRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($tag, $request) {
            $status = (new Editor($request))->edit($tag);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Tag $tag
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Tag $tag, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($tag, $request) {
            $status = $tag->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Tag $tag
     * @return JsonResponse|mixed
     */
    public function detail(Tag $tag): mixed
    {
        return $this->withComponentErrorHandling(function () use ($tag) {

            return fractal()
                ->item($tag)
                ->transformWith(new DetailTagTransformer())
                ->respond();
        });
    }
}
