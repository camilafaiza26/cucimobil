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
use App\Models\Paket;use Carbon\Carbon;


class Detail_Paket extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     */
    public $timestamps = false;
    protected $table = 'detail_pakets';
    protected $fillable = [
        'layanan_id', 'paket_id'
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class)
        ->join('layanans', 'layanans.id', '=', 'pakets.layanan_id');
    }
   


}
