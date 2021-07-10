<?php

namespace App\Models\Order;

use App\Models\Dictionary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Dictionary
{
    use HasFactory;

    protected $table = 'types_orders';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
