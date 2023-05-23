<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ImageCommonClass
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
     * @param $image
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $image = null): array
    {
        return [
            'image_type' => $this->makeField($image, $edit, 'image_type'),
            'reference_id' => $this->makeField($image, $edit, 'reference_id'),
            'url' => $this->makeField($image, $edit, 'url'),
            'sort_no' => $this->makeField($image, $edit, 'sort_no'),
        ];
    }

    /**
     * @param $image
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($image, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $image->{$fil} :
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
