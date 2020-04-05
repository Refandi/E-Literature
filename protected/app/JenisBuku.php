<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBuku extends Model
{
    protected $table = 'jenis_buku';

    protected $fillable = [
        'jenis_buku'
    ];
}
