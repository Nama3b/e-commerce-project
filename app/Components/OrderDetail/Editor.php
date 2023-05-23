<?php

namespace App\Components\OrderDetail;

use App\Components\Common\OrderDetailCommonClass;
use App\Models\OrderDetail;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends OrderDetailCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param OrderDetail $orderDetail
     * @return bool
     */
    public function edit(OrderDetail $orderDetail): bool
    {
        return $orderDetail->update($this->buildCreateData(true, $orderDetail));
    }
}
