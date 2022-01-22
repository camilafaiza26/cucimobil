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

class Layanan extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'layanans';
    protected $fillable = [
        'nama_layanan',
        'harga',
        'jenis_id',
    ];

    
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nama_layanan', 'like', '%'.$query.'%')
            ->orWhere('nama_jenis', 'like', '%'.$query.'%')
            ->orWhere('harga', 'like', '%'.$query.'%');
    }

    public function paket(){
        return $this->belongsToMany(Paket::class);
    }
}
