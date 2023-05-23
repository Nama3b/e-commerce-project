<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\PaymentOption
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Delivery> $product
 * @property-read int|null $product_count
 * @method static Builder|PaymentOption newModelQuery()
 * @method static Builder|PaymentOption newQuery()
 * @method static Builder|PaymentOption onlyTrashed()
 * @method static Builder|PaymentOption query()
 * @method static Builder|PaymentOption whereCreatedAt($value)
 * @method static Builder|PaymentOption whereDeletedAt($value)
 * @method static Builder|PaymentOption whereId($value)
 * @method static Builder|PaymentOption whereName($value)
 * @method static Builder|PaymentOption whereUpdatedAt($value)
 * @method static Builder|PaymentOption withTrashed()
 * @method static Builder|PaymentOption withoutTrashed()
 * @mixin Eloquent
 */
class PaymentOption extends Model
{
    use HasFactory, SoftDeletes;

    const CREATE = 'CREATE_PAYMENT_OPTION';
    const VIEW = 'VIEW_PAYMENT_OPTION';
    const EDIT = 'EDIT_PAYMENT_OPTION';
    const DELETE = 'DELETE_PAYMENT_OPTION';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_option';

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
        return $this->HasMany(Delivery::class,'payment_option_id','id');
    }

}
