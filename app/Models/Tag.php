<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    const TAG_TYPE = ['PRODUCT', 'POST'];
    const CREATE = 'CREATE_TAG';
    const VIEW = 'VIEW_TAG';
    const EDIT = 'EDIT_TAG';
    const DELETE = 'DELETE_TAG';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * @var string[]
     */
    protected $fillable = [
        'tag_type',
        'reference_id',
        'creator',
        'name'
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
    public function member(): BelongsTo
    {
        return $this->BelongsTo(Member::class,'id', 'creator');
    }
}
