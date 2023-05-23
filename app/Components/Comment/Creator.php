<?php

namespace App\Components\Comment;

use App\Components\Common\CommentCommonClass;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends CommentCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Comment
     */
    public function create(): Model|Comment
    {
        return Comment::create($this->buildCreateData());
    }
}
