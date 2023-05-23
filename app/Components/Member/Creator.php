<?php

namespace App\Components\Member;

use App\Components\Common\MemberCommonClass;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends MemberCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Member
     */
    public function create(): Model|Member
    {
        return Member::create($this->buildCreateData());
    }
}
