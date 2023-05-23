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
 * App\Models\Tag
 *
 * @property int $id
 * @property int $reference_id
 * @property int $creator
 * @property string $name
 * @property string $tag_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Member|null $member
 * @property-read Post|null $posts
 * @property-read Product|null $products
 * @method static Builder|Tag newModelQuery()
 * @method static Builder|Tag newQuery()
 * @method static Builder|Tag onlyTrashed()
 * @method static Builder|Tag query()
 * @method static Builder|Tag whereCreatedAt($value)
 * @method static Builder|Tag whereCreator($value)
 * @method static Builder|Tag whereDeletedAt($value)
 * @method static Builder|Tag whereId($value)
 * @method static Builder|Tag whereName($value)
 * @method static Builder|Tag whereReferenceId($value)
 * @method static Builder|Tag whereTagType($value)
 * @method static Builder|Tag whereUpdatedAt($value)
 * @method static Builder|Tag withTrashed()
 * @method static Builder|Tag withoutTrashed()
 * @mixin Eloquent
 */
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
