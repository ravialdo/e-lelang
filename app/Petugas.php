<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $guarded = ['id'];

    protected $table = 'tb_petugas';

    protected $fillable = [
        'nama_petugas', 'username', 'password', 'id_level'
    ];

    protected $hidden = [
        'password'
    ];

    public function level(){
        return $this->hasOne(Level::class, 'id', 'id_level');
    }
}
