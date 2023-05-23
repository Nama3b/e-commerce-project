<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
