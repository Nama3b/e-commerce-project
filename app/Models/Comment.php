<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    const COMMENT_TYPE = ['PRODUCT', 'POST'];
    const CREATE = 'CREATE_COMMENT';
    const VIEW = 'VIEW_COMMENT';
    const EDIT = 'EDIT_COMMENT';
    const DELETE = 'DELETE_COMMENT';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var string[]
     */
    protected $fillable = [
        'comment_type',
        'reference_id',
        'customer_id',
        'content',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class,'id', 'reference_id');
    }

    /**
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->BelongsTo(Post::class,'id', 'reference_id');
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class,'id','customer_id');
    }

}
