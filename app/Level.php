<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = ['id'];

    protected $table = 'tb_level';

    protected $fillable = [
         'level'
    ];
}
