<?php

namespace App\Components\Customer;

use App\Components\Common\CustomerCommonClass;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends CustomerCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Customer
     */
    public function create(): Model|Customer
    {
        return Customer::create($this->buildCreateData());
    }
}
