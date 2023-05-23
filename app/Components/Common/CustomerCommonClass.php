<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CustomerCommonClass
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
     * @param $customer
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $customer = null): array
    {
        return [
            'email' => $this->makeField($customer, $edit, 'email'),
            'password' => $this->makeField($customer, $edit, 'password'),
            'full_name' => $this->makeField($customer, $edit, 'full_name'),
            'address' => $this->makeField($customer, $edit, 'address'),
            'phone_number' => $this->makeField($customer, $edit, 'phone_number'),
            'birthday' => $this->makeField($customer, $edit, 'birthday'),
            'avatar' => $this->request->hasFile('avatar') ? $this->uploadImage() : $customer->image,
            'status' => $this->makeField($customer, $edit, 'status'),
        ];
    }

    /**
     * @param $customer
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($customer, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $customer->{$fil} :
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
