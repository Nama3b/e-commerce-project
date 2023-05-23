<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Member
 *
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $email
 * @property string $full_name
 * @property string $address
 * @property string $phone_number
 * @property string|null $birthday
 * @property string $identity_no
 * @property string|null $avatar
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Admin|null $admin
 * @property-read Collection<int, Delivery> $delivery
 * @property-read int|null $delivery_count
 * @property-read Collection<int, Post> $posts
 * @property-read int|null $posts_count
 * @property-read Collection<int, Product> $products
 * @property-read int|null $products_count
 * @property-read Collection<int, Shipping> $shippings
 * @property-read int|null $shippings_count
 * @property-read Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @method static Builder|Member newModelQuery()
 * @method static Builder|Member newQuery()
 * @method static Builder|Member onlyTrashed()
 * @method static Builder|Member query()
 * @method static Builder|Member whereAddress($value)
 * @method static Builder|Member whereAvatar($value)
 * @method static Builder|Member whereBirthday($value)
 * @method static Builder|Member whereCreatedAt($value)
 * @method static Builder|Member whereDeletedAt($value)
 * @method static Builder|Member whereEmail($value)
 * @method static Builder|Member whereFullName($value)
 * @method static Builder|Member whereId($value)
 * @method static Builder|Member whereIdentityNo($value)
 * @method static Builder|Member wherePassword($value)
 * @method static Builder|Member wherePhoneNumber($value)
 * @method static Builder|Member whereStatus($value)
 * @method static Builder|Member whereUpdatedAt($value)
 * @method static Builder|Member whereUserName($value)
 * @method static Builder|Member withTrashed()
 * @method static Builder|Member withoutTrashed()
 * @mixin Eloquent
 */
class Member extends Model
{
    use HasFactory, SoftDeletes;

    const CREATE = 'CREATE_MEMBER';
    const VIEW = 'VIEW_MEMBER';
    const EDIT = 'EDIT_MEMBER';
    const DELETE = 'DELETE_MEMBER';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_name',
        'password',
        'email',
        'full_name',
        'address',
        'phone_number',
        'birthday',
        'identity_no',
        'avatar',
        'status',
        'approver',
    ];

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->BelongsTo(Admin::class, 'id', 'approver');
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->HasMany(Product::class, 'creator', 'id');
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->HasMany(Post::class,'author','id');
    }

    /**
     * @return HasMany
     */
    public function tags(): HasMany
    {
        return $this->HasMany(Tag::class, 'creator', 'id');
    }

    /**
     * @return HasMany
     */
    public function delivery(): HasMany
    {
        return $this->HasMany(Delivery::class, 'creator', 'id');
    }

    /**
     * @return HasMany
     */
    public function shippings(): HasMany
    {
        return $this->HasMany(Shipping::class, 'manager', 'id');
    }
}
