<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\OrderDetail
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property float $price
 * @property int $quantity
 * @property float $ total_price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Customer|null $order
 * @property-read Product|null $product
 * @method static Builder|OrderDetail newModelQuery()
 * @method static Builder|OrderDetail newQuery()
 * @method static Builder|OrderDetail onlyTrashed()
 * @method static Builder|OrderDetail query()
 * @method static Builder|OrderDetail whereCreatedAt($value)
 * @method static Builder|OrderDetail whereDeletedAt($value)
 * @method static Builder|OrderDetail whereId($value)
 * @method static Builder|OrderDetail whereOrderId($value)
 * @method static Builder|OrderDetail wherePrice($value)
 * @method static Builder|OrderDetail whereProductId($value)
 * @method static Builder|OrderDetail whereQuantity($value)
 * @method static Builder|OrderDetail whereTotalPrice($value)
 * @method static Builder|OrderDetail whereUpdatedAt($value)
 * @method static Builder|OrderDetail withTrashed()
 * @method static Builder|OrderDetail withoutTrashed()
 * @mixin Eloquent
 */
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
