<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Lelang;
use Session;

class LelangComponent extends Component
{
	use WithPagination;
	
	protected $listeners = ['read'];
	
    public $total = 9,  $read,  $hargaAwal, $hargaAkhir, $hargaTertinggi, $colorComment = 'primary', $colorLelang = 'light';
    public $totalTawaran, $totalComment, $lelangMode = true, $commentTab = true, $lelangTab, $readMore, $selectedId;

     private $validate = [
          'hargaAkhir' => 'required'
     ];

     public function  resetInputLelang(){
           $this->hargaAkhir = '';
     }

	public function comments(){
		$this->commentTab = true;
		$this->lelangTab = false;
		$this->colorComment = 'primary';
		$this->colorLelang = 'transparent';
	}
	
	public function lelang(){
		$this->commentTab = false;
		$this->lelangTab = true;
		$this->colorComment = 'transparent';
		$this->colorLelang = 'primary';
	}

   public function addPrice($id)
   {
		$this->validate($this->validate);
		
		$data = Lelang::find($id);
		
	     if($this->hargaAkhir < $data->barang->harga_awal){
			session()->flash('danger', 'Harga yang kamu masukan terlalu rendah dari harga awal!');
			return 0;
		}elseif($this->hargaAkhir == $data->barang->harga_awal){
			session()->flash('danger', 'Harga yang kamu masukan adalah harga awal, masukan harga lebih tinggi lagi!');
			return 0;
		}elseif($this->hargaAkhir < $this->hargaTertinggi){
			session()->flash('danger', 'Harga yang kamu masukan terlalu rendah dari harga yang paling tertinggi!');
			return 0;
		}elseif($this->hargaAkhir == $this->hargaTertinggi){
			session()->flash('danger', 'Harga yang kamu masukan sudah ada!');
			return 0;
		}
		
		$data->update([
			'harga_akhir' => $this->hargaAkhir,
			'id_masyarakat' => Session::get('id')
		]);
		
		$lelang = Lelang::where('id', $id)->get();
		
		foreach($lelang as $val){
			Lelang::find($id)->history()->create([
		     	'id_barang' => $val->id_barang,
		     	'id_masyarakat' => session()->get('id'),
				'penawaran_harga' => $this->hargaAkhir
			]);	
		}
		
		$this->emit('read', $id);
		$this->hargaTertinggi = $this->hargaAkhir;
		$this->resetInputLelang();
		$this->commentTab = false;
		$this->lelangTab = true;
   }
	
    public function read($id)
    {
	     $this->totalTawaran = Lelang::find($id)->history()->count();
	     $this->selectedId = $id;
          $this->lelangMode =  false;
          $this->readMore = true;
          $this->read = Lelang::where('id', $id)->get();
    }

	public function closeRead(){
		$this->lelangMode = true;
		$this->readMore = false;
	}

    public function render()
    {
	   Session::put('page', 'lelang');
	   $data = Lelang::where('id', $this->selectedId)->get();
	
	   		foreach($data as $value){
				$this->hargaTertinggi = $value->harga_akhir;
			}
			
	    
	
        return view('livewire.lelang-component', [
              'lelang' => Lelang::where('status', 'buka')->orderBy('id', 'desc')->paginate($this->total),
        ]);
    }
	
}
