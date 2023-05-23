<?php

namespace App\Components\Favorite;

use App\Components\Common\FavoriteCommonClass;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends FavoriteCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Favorite
     */
    public function create(): Model|Favorite
    {
        return Favorite::create($this->buildCreateData());
    }
}
