<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // table
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function dosen()
    {
        return $this->hasOne(dosen::class, 'user_id');
    }

    public function pegawai()
    {
        return $this->hasOne(pegawai::class, 'user_id');
    }

    public function kaprodi()
    {
        return $this->hasOne(ketuaProgramStudi::class, 'user_id');
    }

    public function ketuaKelompokKeahlian()
    {
        return $this->hasOne(ketuaKelompokKeahlian::class, 'user_id');
    }

    public function kepalaUrusanSumberDaya()
    {
        return $this->hasOne(kepalaUrusanSumberDaya::class, 'user_id');
    }

    public function bidangII()
    {
        return $this->hasOne(BidangII::class, 'user_id');
    }
}
