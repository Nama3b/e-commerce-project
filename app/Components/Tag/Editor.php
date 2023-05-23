<?php

namespace App\Components\Tag;

use App\Components\Common\TagCommonClass;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends TagCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Tag $tag
     * @return bool
     */
    public function edit(Tag $tag): bool
    {
        return $tag->update($this->buildCreateData(true, $tag));
    }
}
