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
use App\Models\Detail_Paket;

class Paket extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamp =false;

    protected $fillable = [
        'nama_paket', 'jenis_id', 'harga'
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nama_paket', 'like', '%'.$query.'%');
    }

    public function detail_paket()
    {
        return $this->hasMany(Detail_Paket::class, 'paket_id');
    }

}
