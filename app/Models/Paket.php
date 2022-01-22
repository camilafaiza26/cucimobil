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
use Carbon\Carbon;

class Paket extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    public $timestamps = false;

    protected $fillable = [
        'nama_paket', 'diskon' ,'harga_paket'
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nama_paket', 'like', '%'.$query.'%');
    }

   public function layanan(){
       return $this->belongsToMany(Layanan::class);
   }

}
