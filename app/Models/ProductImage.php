<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'image',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function getProductImageById(string $id): Model|Collection|Builder|array|null
    {
        return ProductImage::query()->findOrFail($id);
    }
}
