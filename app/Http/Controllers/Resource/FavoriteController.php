<?php

namespace App\Http\Controllers\Resource;

use App\Components\Favorite\Creator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Resource\StoreFavoriteRequest;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('favorite');
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
            ->render('admin.pages.favorite', compact('config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreFavoriteRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreFavoriteRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

}
