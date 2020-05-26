<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guarded = ['id'];

    protected $table = 'tb_barang';

    protected $fillable = [
        'nama_barang', 'harga_awal', 'deskripsi_barang'
    ];

    public function rupiah($number){
          return number_format($number, 0, ',', '.');
     }
      
     public function lelang(){
          return $this->hasMany(Lelang::class,'id_barang');
     }
}
