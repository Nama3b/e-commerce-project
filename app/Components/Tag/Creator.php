<?php

namespace App\Components\Tag;

use App\Components\Common\TagCommonClass;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends TagCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Tag
     */
    public function create(): Model|Tag
    {
        return Tag::create($this->buildCreateData());
    }
}
