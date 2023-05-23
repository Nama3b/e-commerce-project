<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ShippingCommonClass
{

    use WithPaginationLimit;

    /**
     * The creating target request instance.
     *
     */
    protected FormRequest $request;

    /**
     * Create new request instance.
     */
    public function __construct(FormRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @param bool $edit
     * @param $shipping
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $shipping = null): array
    {
        return [
            'delivery_id' => $this->makeField($shipping, $edit, 'delivery_id'),
            'manager' => $this->makeField($shipping, $edit, 'manager'),
            'customer_name' => $this->makeField($shipping, $edit, 'customer_name'),
            'phone_number' => $this->makeField($shipping, $edit, 'phone_number'),
            'shipping_delivery_address' => $this->makeField($shipping, $edit, 'shipping_delivery_address'),
            'shipping_delivery_time' => $this->makeField($shipping, $edit, 'shipping_delivery_time'),
            'status' => $this->makeField($shipping, $edit, 'status'),
        ];
    }

    /**
     * @param $shipping
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($shipping, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $shipping->{$fil} :
            $this->request->input($fil);
    }

    /**
     * @param string $fil
     * @return bool
     */
    private function existField(string $fil = ''): bool
    {
        return $this->request->filled($fil);
    }

}
