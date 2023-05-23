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
 * App\Models\Rate
 *
 * @property int $id
 * @property int $product_id
 * @property int $customer_id
 * @property int $rate
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Customer|null $customer
 * @property-read Product|null $product
 * @method static Builder|Rate newModelQuery()
 * @method static Builder|Rate newQuery()
 * @method static Builder|Rate onlyTrashed()
 * @method static Builder|Rate query()
 * @method static Builder|Rate whereCreatedAt($value)
 * @method static Builder|Rate whereCustomerId($value)
 * @method static Builder|Rate whereDeletedAt($value)
 * @method static Builder|Rate whereId($value)
 * @method static Builder|Rate whereProductId($value)
 * @method static Builder|Rate whereRate($value)
 * @method static Builder|Rate whereUpdatedAt($value)
 * @method static Builder|Rate withTrashed()
 * @method static Builder|Rate withoutTrashed()
 * @mixin Eloquent
 */
class Rate extends Model
{
    use HasFactory, SoftDeletes;

    const CREATE = 'CREATE_RATE';
    const VIEW = 'VIEW_RATE';
    const EDIT = 'EDIT_RATE';
    const DELETE = 'DELETE_RATE';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rates';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'customer_id',
        'rate',
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class,'id','product_id');
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class,'id','customer_id',);
    }

}
