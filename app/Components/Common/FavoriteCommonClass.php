<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class FavoriteCommonClass
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
     * @param $post
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $post = null): array
    {
        return [
            'category_id' => $this->makeField($post, $edit, 'category_id'),
            'creator' => $this->makeField($post, $edit, 'creator'),
            'name' => $this->makeField($post, $edit, 'name'),
            'description' => $this->makeField($post, $edit, 'description'),
            'price' => $this->makeField($post, $edit, 'price'),
            'quantity' => $this->makeField($post, $edit, 'quantity'),
            'image' => $this->request->hasFile('image') ? $this->uploadImage() : $post->image,
            'status' => $this->makeField($post, $edit, 'status'),
        ];
    }

    /**
     * @param $post
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($post, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $post->{$fil} :
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
