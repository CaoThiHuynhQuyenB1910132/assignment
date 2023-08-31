<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'message',
        'phone',
    ];

    public static function getContactById(string $id): Model|Collection|Builder|array|null
    {
        return Contact::query()->findOrFail($id);
    }
}
