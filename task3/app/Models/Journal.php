<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'description'];

    public function journals()
    {
        return $this->belongsToMany(Journal::class);
    }


    public static function add($fields)
    {
        $journal = new static;
        $journal->fill($fields);

        return $journal->save();
    }
}
