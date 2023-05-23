<?php

namespace App\Components\Order;

use App\Components\Common\OrderCommonClass;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends OrderCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Order
     */
    public function create(): Model|Order
    {
        return Order::create($this->buildCreateData());
    }
}
