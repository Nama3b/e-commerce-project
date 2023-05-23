<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
