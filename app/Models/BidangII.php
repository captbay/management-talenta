<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangII extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'bidang_i_i_s';

    protected $guarded = ['id'];


    protected $fillable = [
        'user_id',
        'nama',
        'tanggal_lahir'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
