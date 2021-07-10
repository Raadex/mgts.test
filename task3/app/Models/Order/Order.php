<?php

namespace App\Models\Order;

use App\Models\Equipment\Equipment;
use App\Models\Tariff;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'phone',
        'type_id',
        'status_id',
        'equipment_id',
        'tariff_id',
        'user_id'
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function tariff(){
        return $this->belongsTo(Tariff::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public static function add($fields)
    {
        $order = new static;
        $order->fill($fields);
        $order->save();

        return $order;
    }
}
