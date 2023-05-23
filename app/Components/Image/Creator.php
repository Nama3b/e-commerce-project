<?php

namespace App\Components\Image;

use App\Components\Common\ImageCommonClass;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends ImageCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Image
     */
    public function create(): Model|Image
    {
        return Image::create($this->buildCreateData());
    }
}
