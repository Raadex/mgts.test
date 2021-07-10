<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['second_name', 'first_name'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public static function add($field)
    {
        $author = new static;
        $author->fill($field);
        $author->patronymic = empty($field['patronymic']) ? "" : $field['patronymic'];

        $author->save();
        return $author;
    }

    public function edit($field)
    {
        $this->fill($field);
        $this->patronymic = empty($field['patronymic']) ? "" : $field['patronymic'];

        return $this->save();
    }

}
