<?php

namespace App\Components\Order;

use App\Components\Common\OrderCommonClass;
use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends OrderCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Order $order
     * @return bool
     */
    public function edit(Order $order): bool
    {
        return $order->update($this->buildCreateData(true, $order));
    }
}
