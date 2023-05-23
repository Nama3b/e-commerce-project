<?php

namespace App\Components\Shipping;

use App\Components\Common\ShippingCommonClass;
use App\Models\Shipping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends ShippingCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Shipping
     */
    public function create(): Model|Shipping
    {
        return Shipping::create($this->buildCreateData());
    }
}
