<?php

namespace App\Components\Product;

use App\Components\Common\ProductCommonClass;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends ProductCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Product $Product
     * @return bool
     */
    public function edit(Product $Product): bool
    {
        return $Product->update($this->buildCreateData(true, $Product));
    }
}
