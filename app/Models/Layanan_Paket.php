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


class Layanan_Paket extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     */
    protected $primaryKey = 'id_detail_paket';
    public $timestamps = false;
    protected $table = 'layanan_paket';
    protected $fillable = [
        'layanan_id', 'paket_id'
    ];

 


}
