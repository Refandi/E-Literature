<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBuku extends Model
{
    protected $table = 'jenis_buku';

    protected $fillable = [
        'jenis_buku'
    ];

    //Membuat relasi Many ke model/tabel jenis_buku
    //jenis_buku bisa mempunyai banyak buku 
    public function buku()
    {
    return $this->hasMany('App\Buku'); 
    }


}
