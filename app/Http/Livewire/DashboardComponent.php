<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Masyarakat;
use App\Petugas;
use Session;

class DashboardComponent extends Component
{
	
    public function render()
    {
	   Session::put('page', 'dashboard');
	
	   $data = [
		   'countAdmin' => Petugas::where('id_level', 1)->count(),
		   'countPetugas' => Petugas::where('id_level', 2)->count(),
		   'countMasyarakat' => Masyarakat::all()->count()
	   ];
	
        return view('livewire.dashboard-component', $data);
    }
	
}
