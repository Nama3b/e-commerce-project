<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    const CREATE = 'CREATE_CUSTOMER';
    const VIEW = 'VIEW_CUSTOMER';
    const EDIT = 'EDIT_CUSTOMER';
    const DELETE = 'DELETE_CUSTOMER';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        'full_name',
        'address',
        'phone_number',
        'birthday',
        'avatar',
        'status'
    ];

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
    public function orders(): HasMany
    {
        return $this->HasMany(Order::class, 'customer_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->HasMany(Comment::class, 'customer_id', 'id');
    }
}
