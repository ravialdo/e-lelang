<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
     protected $guarded = ['id'];

     protected $table = 'tb_lelang';

     protected $fillable = [
         'harga_akhir', 'id_masyarakat', 'id_petugas', 'status'
     ];

      public function createdAt(){
           
      }

     public function barang()
     {
          return $this->belongsTo(Barang::class, 'id_barang');
     }

     public function masyarakat()
     {
         return $this->belongsTo(Masyarakat::class, 'id_masyrakat');
	}
	
	public function history(){
	    return $this->hasMany(History::class,'id_lelang');
	}
}
