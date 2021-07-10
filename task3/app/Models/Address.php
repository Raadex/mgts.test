<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'region',
        'city',
        'street',
        'house',
        'flat'
    ];

    public static function add($fields)
    {
        $address = new static;
        $address->fill($fields);
        $address->save();

        return $address;
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
