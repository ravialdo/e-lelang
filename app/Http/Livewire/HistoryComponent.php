<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Lelang;
use Session;

class HistoryComponent extends Component
{
	
	public $total = 9, $status = 'buka';
	
    public function render()
    {
	   Session::put('page', 'history');
	
	   $data = [
	         'lelang' => Lelang::where('status', $this->status)->orderBy('id', 'desc')->paginate($this->total)
	   ];
	
        return view('livewire.history-component', $data);
    }
	
}
