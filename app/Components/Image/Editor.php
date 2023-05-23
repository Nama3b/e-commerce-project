<?php

namespace App\Components\Image;

use App\Components\Common\ImageCommonClass;
use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends ImageCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Image $image
     * @return bool
     */
    public function edit(Image $image): bool
    {
        return $image->update($this->buildCreateData(true, $image));
    }
}
