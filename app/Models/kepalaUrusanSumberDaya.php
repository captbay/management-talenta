<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kepalaUrusanSumberDaya extends Model
{
    use HasFactory;

    protected $table = 'kepala_urusan_sumber_dayas';

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
