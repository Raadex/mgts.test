<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['name'];

    public static function add($fields)
    {
        $obj = new static;
        $obj->fill($fields);

        return $obj->save();
    }
}
