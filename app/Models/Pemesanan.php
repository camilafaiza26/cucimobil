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

class Pemesanan extends Authenticatable
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pelanggan_id',
        'paket_id',
        'merek_id',
        'user_id',
        'tanggal_pemesanan',
        'plat',
        'status_bayar',
    ];

 
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('no_antrian', 'like', '%'.$query.'%')
                ->orWhere('plat', 'like', '%'.$query.'%')
                ->orWhere('status_bayar', 'like', '%'.$query.'%');
    }

}
