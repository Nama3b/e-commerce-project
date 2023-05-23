<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class DeliveryCommonClass
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
     * @param $delivery
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $delivery = null): array
    {
        return [
            'service_name' => $this->makeField($delivery, $edit, 'service_name'),
            'creator' => $this->makeField($delivery, $edit, 'creator'),
            'payment_option_id' => $this->makeField($delivery, $edit, 'payment_option_id'),
            'delivery_fee' => $this->makeField($delivery, $edit, 'delivery_fee'),
            'delivery_time' => $this->makeField($delivery, $edit, 'delivery_time'),
            'description' => $this->makeField($delivery, $edit, 'description'),
        ];
    }

    /**
     * @param $delivery
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($delivery, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $delivery->{$fil} :
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
