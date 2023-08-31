<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'status',
        'featured',
        'original_price',
        'selling_price',
        'stock',
        'category_id',
    ];

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function wishLists(): HasMany
    {
        return $this->hasMany(WishList::class);
    }

    public function feedBacks(): HasMany
    {
        return $this->hasMany(FeedBack::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public static function getProductById(string $id): Model|Collection|Builder|array|null
    {
        return Product::query()->findOrFail($id);
    }

}
