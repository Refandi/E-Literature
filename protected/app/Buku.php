<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'judul_buku', 'jenis_buku_id', 'pengarang_id', 'penerbit_id', 'tahun_terbit_id', 'sinopsis'
    ];


    //Tabel buku dimiliki atau terhubung dengan tabel jenis_buku 
    public function jenis_buku()
    {
    return $this->belongsTo('App\JenisBuku');
    }

    /////////////////////////////////////////////////////////////////////

    //Tabel buku dimiliki atau terhubung dengan tabel pengarang 
    public function pengarang()
    {
    return $this->belongsTo('App\Pengarang');
    }

    /////////////////////////////////////////////////////////////////////

    //Tabel buku dimiliki atau terhubung dengan tabel pengarang 
    public function penerbit()
    {
    return $this->belongsTo('App\Penerbit');
    }

    /////////////////////////////////////////////////////////////////////

    //Tabel buku dimiliki atau terhubung dengan tabel tahun_terbit 
    public function tahun_terbit()
    {
    return $this->belongsTo('App\TahunTerbit');
    }

}
