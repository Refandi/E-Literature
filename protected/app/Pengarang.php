<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    protected $table = 'pengarang';

    protected $fillable = [
        'pengarang'
    ];

    //Membuat relasi Many ke model/tabel jenis_buku
    //jenis_buku bisa mempunyai banyak buku 
    public function buku()
    {
    return $this->hasMany('App\Buku'); 
    }
}
