<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class OrderCommonClass
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
     * @param $order
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $order = null): array
    {
        return [
            'customer_id' => $this->makeField($order, $edit, 'customer_id'),
            'shipping_id' => $this->makeField($order, $edit, 'shipping_id'),
            'name' => $this->makeField($order, $edit, 'name'),
            'email' => $this->makeField($order, $edit, 'email'),
            'address' => $this->makeField($order, $edit, 'address'),
            'phone_number' => $this->makeField($order, $edit, 'phone_number'),
            'notice' => $this->makeField($order, $edit, 'notice'),
            'total' => $this->makeField($order, $edit, 'total'),
            'status' => $this->makeField($order, $edit, 'status'),
            'order_update_date' => $this->makeField($order, $edit, 'order_update_date'),
        ];
    }

    /**
     * @param $order
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($order, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $order->{$fil} :
            $this->request->input($fil);
    }

    /**
     * @return bool|string
     */
    private function uploadImage(): bool|string
    {
        return $this->request->file('image')->store('image', ['disk' => 'public']);
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
