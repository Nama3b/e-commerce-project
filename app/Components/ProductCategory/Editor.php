<?php

namespace App\Components\ProductCategory;

use App\Components\Common\ProductCategoryCommonClass;
use App\Models\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends ProductCategoryCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param ProductCategory $productCategory
     * @return bool
     */
    public function edit(ProductCategory $productCategory): bool
    {
        return $productCategory->update($this->buildCreateData(true, $productCategory));
    }
}
