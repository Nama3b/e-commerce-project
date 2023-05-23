<?php

namespace App\Components\OrderDetail;

use App\Components\Common\OrderCommonClass;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends OrderCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|OrderDetail
     */
    public function create(): Model|OrderDetail
    {
        return OrderDetail::create($this->buildCreateData());
    }
}
