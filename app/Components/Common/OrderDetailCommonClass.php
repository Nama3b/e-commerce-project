<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class OrderDetailCommonClass
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
     * @param $orderDetail
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $orderDetail = null): array
    {
        return [
            'order_id' => $this->makeField($orderDetail, $edit, 'order_id'),
            'product_id' => $this->makeField($orderDetail, $edit, 'product_id'),
            'price' => $this->makeField($orderDetail, $edit, 'price'),
            'quantity' => $this->makeField($orderDetail, $edit, 'quantity'),
            'total_price' => $this->makeField($orderDetail, $edit, 'total_price'),
        ];
    }

    /**
     * @param $orderDetail
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($orderDetail, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $orderDetail->{$fil} :
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
