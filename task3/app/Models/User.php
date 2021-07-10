<?php

namespace App\Models;

use App\Models\Order\Order;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'patronymic',
        'date_of_birth',
        'phone_number',
        'address_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'datetime'
    ];

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function getFullName()
    {
        $fullName = $this->name . ' ' . $this->surname;
        $fullName .= isset($this->patronymic) ? ' ' . $this->patronymic : '';
        return $fullName;
    }

}
