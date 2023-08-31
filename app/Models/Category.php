<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image',
        'featured',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function getCategoryById(string $id): Model|Collection|Builder|array|null
    {
        return Category::query()->findOrFail($id);
    }
}
