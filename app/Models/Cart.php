<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function getCartById(string $id): Model|Collection|Builder|array|null
    {
        return Cart::query()->findOrFail($id);
    }
}
