<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'number',
        'date_of_issue',
        'agency',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function add($fields)
    {
        $documents = new static;
        $documents->fill($fields);
        $documents->save();

        return $documents;
    }
}
