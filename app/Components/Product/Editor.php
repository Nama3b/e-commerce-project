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
     * @param Product $product
     * @return bool
     */
    public function edit(Product $product): bool
    {
        return $product->update($this->buildCreateData(true, $product));
    }
}
