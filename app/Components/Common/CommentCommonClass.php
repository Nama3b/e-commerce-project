<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CommentCommonClass
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
     * @param $comment
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $comment = null): array
    {
        return [
            'comment_type' => $this->makeField($comment, $edit, 'comment_type'),
            'reference_id' => $this->makeField($comment, $edit, 'reference_id'),
            'customer_id' => $this->makeField($comment, $edit, 'customer_id'),
            'content' => $this->makeField($comment, $edit, 'content'),
            'status' => $this->makeField($comment, $edit, 'status'),
        ];
    }

    /**
     * @param $comment
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($comment, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $comment->{$fil} :
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
