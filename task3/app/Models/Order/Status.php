<?php

namespace App\Models\Order;

use App\Models\Dictionary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Dictionary
{
    use HasFactory;

    protected $table = 'statuses_orders';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
