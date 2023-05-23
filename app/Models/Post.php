<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Post
 *
 * @property integer $id
 * @property integer $author
 * @property string $title
 * @property string $content
 * @property string $post_type
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Customer $customer_author
 * @property-read Member $member_author
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post onlyTrashed()
 * @method static Builder|Post query()
 * @method static Builder|Post whereAuthor($value)
 * @method static Builder|Post whereContent($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDeletedAt($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post wherePostType($value)
 * @method static Builder|Post whereStatus($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post withTrashed()
 * @method static Builder|Post withoutTrashed()
 * @mixin Eloquent
 */
class Post extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS = ['WAITING', 'ACTIVE', 'CLOSED'];
    const POST_TYPE = ['PRODUCT', 'POST'];
    const CREATE = 'CREATE_POST';
    const VIEW = 'VIEW_POST';
    const EDIT = 'EDIT_POST';
    const DELETE = 'DELETE_POST';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'author',
        'title',
        'content',
        'post_type',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class,'id','author');
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class,'id', 'author');
    }
}
