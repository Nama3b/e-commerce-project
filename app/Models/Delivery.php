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
 * App\Models\Delivery
 *
 * @property int $id
 * @property int $creator
 * @property int $payment_option_id
 * @property string $service_name
 * @property float $delivery_fee
 * @property string $delivery_time
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Member|null $member
 * @property-read PaymentOption|null $payments
 * @method static Builder|Delivery newModelQuery()
 * @method static Builder|Delivery newQuery()
 * @method static Builder|Delivery onlyTrashed()
 * @method static Builder|Delivery query()
 * @method static Builder|Delivery whereCreatedAt($value)
 * @method static Builder|Delivery whereCreator($value)
 * @method static Builder|Delivery whereDeletedAt($value)
 * @method static Builder|Delivery whereDeliveryFee($value)
 * @method static Builder|Delivery whereDeliveryTime($value)
 * @method static Builder|Delivery whereDescription($value)
 * @method static Builder|Delivery whereId($value)
 * @method static Builder|Delivery wherePaymentOptionId($value)
 * @method static Builder|Delivery whereServiceName($value)
 * @method static Builder|Delivery whereUpdatedAt($value)
 * @method static Builder|Delivery withTrashed()
 * @method static Builder|Delivery withoutTrashed()
 * @mixin Eloquent
 */
class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    const CREATE = 'CREATE_DELIVERY';
    const VIEW = 'VIEW_DELIVERY';
    const EDIT = 'EDIT_DELIVERY';
    const DELETE = 'DELETE_DELIVERY';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'delivery';

    /**
     * @var string[]
     */
    protected $fillable = [
        'creator',
        'payment_option_id',
        'service_name',
        'delivery_fee',
        'delivery_time',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class,'id','creator');
    }

    /**
     * @return BelongsTo
     */
    public function payments(): BelongsTo
    {
        return $this->BelongsTo(PaymentOption::class,'id', 'payment_option_id');
    }
}
