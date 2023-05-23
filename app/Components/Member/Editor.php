<?php

namespace App\Components\Member;

use App\Components\Common\MemberCommonClass;
use App\Models\Member;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends MemberCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Member $member
     * @return bool
     */
    public function edit(Member $member): bool
    {
        return $member->update($this->buildCreateData(true, $member));
    }
}
