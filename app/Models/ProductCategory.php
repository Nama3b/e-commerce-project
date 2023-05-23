<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    const CREATE = 'CREATE_PRODUCT_CATEGORY';
    const VIEW = 'VIEW_PRODUCT_CATEGORY';
    const EDIT = 'EDIT_PRODUCT_CATEGORY';
    const DELETE = 'DELETE_PRODUCT_CATEGORY';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_category';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return HasMany
     */
    public function product(): HasMany
    {
        return $this->HasMany(Product::class,'category_id','id');
    }

}
