<?php

namespace App\Components\Comment;

use App\Components\Common\CommentCommonClass;
use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends CommentCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Comment $comment
     * @return bool
     */
    public function edit(Comment $comment): bool
    {
        return $comment->update($this->buildCreateData(true, $comment));
    }
}
