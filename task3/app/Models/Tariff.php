<?php

namespace App\Models;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'monthly_fee'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function add($fields)
    {
        $tariff = new static;
        $tariff->fill($fields);
        $tariff->save();

        return $tariff;
    }
}
