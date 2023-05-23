<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS = ['STOCKOUT', 'STOCKING', 'BANNED'];
    const CREATE = 'CREATE_PRODUCT';
    const VIEW = 'VIEW_PRODUCT';
    const EDIT = 'EDIT_PRODUCT';
    const DELETE = 'DELETE_PRODUCT';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'creator',
        'name',
        'description',
        'price',
        'quantity',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class,'id','category_id');
    }

    /**
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class,'id', 'creator');
    }
}
