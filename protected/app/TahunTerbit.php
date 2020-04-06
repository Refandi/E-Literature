<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunTerbit extends Model
{
    protected $table = 'tahun_terbit';

    protected $fillable = [
        'tahun_terbit'
    ];

    //Membuat relasi Many ke model/tabel jenis_buku
    //jenis_buku bisa mempunyai banyak buku 
    public function buku()
    {
    return $this->hasMany('App\Buku'); 
    }
}
