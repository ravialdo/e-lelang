<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $guarded = ['id'];

    protected $table = 'tb_masyarakat';

    protected $fillable = [
        'nama_lengkap', 'username', 'password', 'telp'
    ];

    protected $hidden = [
        'password'
    ];

}
