<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Pelanggan extends Authenticatable
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nohp',
        'alamat',
    ];

 
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nama', 'like', '%'.$query.'%')
                ->orWhere('nohp', 'like', '%'.$query.'%')
                ->orWhere('alamat', 'like', '%'.$query.'%');
    }
}
