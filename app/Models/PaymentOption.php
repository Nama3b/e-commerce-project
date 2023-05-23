<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
