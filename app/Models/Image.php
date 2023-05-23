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
 * App\Models\Image
 *
 * @property int $id
 * @property int $reference_id
 * @property string $url
 * @property int $sort_no
 * @property string $image_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Post|null $post
 * @property-read Product|null $product
 * @method static Builder|Image newModelQuery()
 * @method static Builder|Image newQuery()
 * @method static Builder|Image onlyTrashed()
 * @method static Builder|Image query()
 * @method static Builder|Image whereCreatedAt($value)
 * @method static Builder|Image whereDeletedAt($value)
 * @method static Builder|Image whereId($value)
 * @method static Builder|Image whereImageType($value)
 * @method static Builder|Image whereReferenceId($value)
 * @method static Builder|Image whereSortNo($value)
 * @method static Builder|Image whereUpdatedAt($value)
 * @method static Builder|Image whereUrl($value)
 * @method static Builder|Image withTrashed()
 * @method static Builder|Image withoutTrashed()
 * @mixin Eloquent
 */
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
