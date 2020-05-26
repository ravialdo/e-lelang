<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = ['id'];

    protected $table = 'history_lelang';

   protected $fillable = [
	  'id_barang', 'id_masyarakat', 'penawaran_harga'
   ];

   public function lelang(){
       return $this->belongsTo(Lelang::class, 'id_lelang');
   }

   public function barang(){
       return $this->belongsTo(Barang::class, 'id_barang');
   }

   public function masyarakat(){
       return $this->belongsTo(Masyarakat::class, 'id_masyarakat');
   }
}
