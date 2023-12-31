<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'name',
        'email',
        'house_number',
        'phone',
        'user_id',
        'district_id',
        'province_id',
        'ward_id',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getAddressById(string $id): Model|Collection|Builder|array|null
    {
        return Address::query()->findOrFail($id);
    }
}
