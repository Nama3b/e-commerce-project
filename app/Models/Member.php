<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
