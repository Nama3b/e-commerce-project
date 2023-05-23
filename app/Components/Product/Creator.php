<?php

namespace App\Components\Product;

use App\Components\Common\ProductCommonClass;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends ProductCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Product
     */
    public function create(): Model|Product
    {
        return Product::create($this->buildCreateData());
    }
}
