<?php

namespace App\Models\Equipment;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = [
        'model',
        'serial_number'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function add($fields)
    {
        $equip = new static;
        $equip->fill($fields);
        $equip->save();

        return $equip;
    }
}
