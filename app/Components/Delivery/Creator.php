<?php

namespace App\Components\Delivery;

use App\Components\Common\DeliveryCommonClass;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends DeliveryCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Delivery
     */
    public function create(): Model|Delivery
    {
        return Delivery::create($this->buildCreateData());
    }
}
