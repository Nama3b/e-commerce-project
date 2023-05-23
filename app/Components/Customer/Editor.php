<?php

namespace App\Components\Customer;

use App\Components\Common\CustomerCommonClass;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends CustomerCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Customer $customer
     * @return bool
     */
    public function edit(Customer $customer): bool
    {
        return $customer->update($this->buildCreateData(true, $customer));
    }
}
