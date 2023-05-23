<?php

namespace App\Components\Delivery;

use App\Components\Common\DeliveryCommonClass;
use App\Models\Delivery;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends DeliveryCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Delivery $delivery
     * @return bool
     */
    public function edit(Delivery $delivery): bool
    {
        return $delivery->update($this->buildCreateData(true, $delivery));
    }
}
