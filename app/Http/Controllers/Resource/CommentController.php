<?php

namespace App\Http\Controllers\Resource;

use App\Components\Comment\Creator;
use App\Components\Comment\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Resource\EditCommentRequest;
use App\Http\Requests\Resource\StoreCommentRequest;
use App\Models\Comment;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Resource\DetailCommentTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('comment');
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
            ->render('admin.pages.comment', compact('config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreCommentRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreCommentRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Comment $comment
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Comment $comment, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($comment, $request) {
            $status = $comment->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Comment $comment
     * @return JsonResponse|mixed
     */
    public function detail(Comment $comment): mixed
    {
        return $this->withComponentErrorHandling(function () use ($comment) {

            return fractal()
                ->item($comment)
                ->transformWith(new DetailCommentTransformer())
                ->respond();
        });
    }
}
