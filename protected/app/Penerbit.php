<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';

    protected $fillable = [
        'penerbit'
    ];


    //Membuat relasi Many ke model/tabel jenis_buku
    //jenis_buku bisa mempunyai banyak buku 
    public function buku()
    {
    return $this->hasMany('App\Buku'); 
    }
}
