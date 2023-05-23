<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    const IMAGE_TYPE = ['PRODUCT', 'POST'];
    const CREATE = 'CREATE_IMAGE';
    const VIEW = 'VIEW_IMAGE';
    const EDIT = 'EDIT_IMAGE';
    const DELETE = 'DELETE_IMAGE';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * @var string[]
     */
    protected $fillable = [
        'image_type',
        'reference_id',
        'url',
        'sort_no'
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class,'id','reference_id');
    }

    /**
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->BelongsTo(Post::class,'id','reference_id');
    }

}
