<?php

namespace App\Components\Shipping;

use App\Components\Common\ShippingCommonClass;
use App\Models\Shipping;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends ShippingCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Shipping $shipping
     * @return bool
     */
    public function edit(Shipping $shipping): bool
    {
        return $shipping->update($this->buildCreateData(true, $shipping));
    }
}
