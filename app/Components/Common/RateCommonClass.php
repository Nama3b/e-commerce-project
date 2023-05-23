<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RateCommonClass
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
     * @param $rate
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $rate = null): array
    {
        return [
            'product_id' => $this->makeField($rate, $edit, 'product_id'),
            'customer_id' => $this->makeField($rate, $edit, 'customer_id'),
            'rate' => $this->makeField($rate, $edit, 'rate'),
        ];
    }

    /**
     * @param $rate
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($rate, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $rate->{$fil} :
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
