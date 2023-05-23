<?php

namespace App\Components\Common;

use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class MemberCommonClass
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
     * @param $member
     * @return array
     */
    #[ArrayShape([])] public function buildCreateData(bool $edit = false, $member = null): array
    {
        return [
            'user_name' => $this->makeField($member, $edit, 'email'),
            'password' => $this->makeField($member, $edit, 'password'),
            'email' => $this->makeField($member, $edit, 'email'),
            'full_name' => $this->makeField($member, $edit, 'full_name'),
            'address' => $this->makeField($member, $edit, 'address'),
            'phone_number' => $this->makeField($member, $edit, 'phone_number'),
            'birthday' => $this->makeField($member, $edit, 'birthday'),
            'identity_no' => $this->makeField($member, $edit, 'identity_no'),
            'avatar' => $this->request->hasFile('avatar') ? $this->uploadImage() : $member->image,
            'status' => $this->makeField($member, $edit, 'status'),
            'approver' => $this->makeField($member, $edit, 'approver'),
        ];
    }

    /**
     * @param $member
     * @param $edit
     * @param string $fil
     * @return mixed
     */
    private function makeField($member, $edit, string $fil = ''): mixed
    {
        return $this->existField($edit) ?
            $member->{$fil} :
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
