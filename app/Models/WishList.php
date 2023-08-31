<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WishList extends Model
{
    protected $table = 'wish_lists';

    protected $fillable = [
        'status'
    ];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
