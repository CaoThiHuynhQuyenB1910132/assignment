<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'notes',
        'user_id',
        'staff',
        'tracking_number',
        'status',
        'payment',
        'shipping_address',
        'total',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public static function getOrderById(string $id): Model|Collection|Builder|array|null
    {
        return Order::query()->findOrFail($id);
    }
}
