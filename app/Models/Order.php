<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'payment_status',
        'shipping_address',
        'total',
    ];

    public static function getMonthlyRevenue()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        return static::whereBetween('updated_at', [$startOfMonth, $endOfMonth])->where('status', 'success')
            ->sum('total');
    }

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
    public function reviewOrders(): HasMany
    {
        return $this->hasMany(ReviewOrder::class);
    }

    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(Coupon::class)
            ->withTimestamps();
    }

    public static function getOrderById(string $id): Model|Collection|Builder|array|null
    {
        return Order::query()->findOrFail($id);
    }
}
