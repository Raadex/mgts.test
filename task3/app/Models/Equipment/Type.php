<?php

namespace App\Models\Equipment;

use App\Models\Dictionary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Dictionary
{
    use HasFactory;

    protected $table = 'types_equipments';

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
