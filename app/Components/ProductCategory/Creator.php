<?php

namespace App\Components\ProductCategory;

use App\Components\Common\ProductCategoryCommonClass;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends ProductCategoryCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|ProductCategory
     */
    public function create(): Model|ProductCategory
    {
        return ProductCategory::create($this->buildCreateData());
    }
}
