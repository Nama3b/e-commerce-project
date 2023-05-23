<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class TagCommonClass
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
     * @param $tag
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $tag = null): array
    {
        return [
            'tax_type' => $this->makeField($tag, $edit, 'tax_type'),
            'reference_id' => $this->makeField($tag, $edit, 'reference_id'),
            'creator' => $this->makeField($tag, $edit, 'creator'),
            'name' => $this->makeField($tag, $edit, 'name'),
        ];
    }

    /**
     * @param $tag
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($tag, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $tag->{$fil} :
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
