<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory, SoftDeletes;

    const FAVORITE_TYPE = ['PRODUCT', 'POST', 'COMMENT'];
    const CREATE = 'CREATE_FAVORITE';
    const VIEW = 'VIEW_FAVORITE';
    const EDIT = 'EDIT_FAVORITE';
    const DELETE = 'DELETE_FAVORITE';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'favorites';

    /**
     * @var string[]
     */
    protected $fillable = [
        'reference_id',
        'customer_id',
        'favorite_type'
    ];

    /**
     * @return BelongsTo
     */
    public function products(): BelongsTo
    {
        return $this->BelongsTo(Product::class,'id','reference_id');
    }

    /**
     * @return BelongsTo
     */
    public function posts(): BelongsTo
    {
        return $this->BelongsTo(Post::class,'id','reference_id');
    }

    /**
     * @return BelongsTo
     */
    public function comments(): BelongsTo
    {
        return $this->BelongsTo(Comment::class,'id','reference_id');
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class,'id', 'customer_id');
    }
}
