<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Petugas;
use App\Level;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	   $level = [
	       'administrator',
	       'petugas'
	    ];
	    
	   foreach($level as $data) :
        	   Level::create([
		  	 'level' => $data
        	   ]);
         endforeach;

        Petugas::create([
            'nama_petugas' => 'Ravialdo Imanda Putra',
             'id_level' => '1',
             'username' => 'Ravialdo',
             'password' => Hash::make('ravialdo')
        ]);
    }
}
