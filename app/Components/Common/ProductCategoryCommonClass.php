<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ProductCategoryCommonClass
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
     * @param $productCategory
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $productCategory = null): array
    {
        return [
            'name' => $this->makeField($productCategory, $edit, 'name'),
        ];
    }

    /**
     * @param $productCategory
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($productCategory, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $productCategory->{$fil} :
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
