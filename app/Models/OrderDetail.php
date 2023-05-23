<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    const CREATE = 'CREATE_ORDER_DETAIL';
    const VIEW = 'VIEW_ORDER_DETAIL';
    const EDIT = 'EDIT_ORDER_DETAIL';
    const DELETE = 'DELETE_ORDER_DETAIL';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_detail';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'total_price',
    ];

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->BelongsTo(Customer::class,'id','order_id');
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class, 'id', 'product_id');
    }

}
