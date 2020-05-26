<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Barang;
use Session;
use Carbon\Carbon;

class BarangComponent extends Component
{
	
    use WithPagination;
	
    public $total = 10, $q,  $nama_barang, $harga_awal, $deskripsi, $detail, $selected_id;
    public $createMode, $updateMode, $detailMode;
	
    private $message = [
		'required' => ':attribute tidak boleh kosong',
		'max'  => ':attribute maksimal harus :max karakter',
		'string' => ':attribute harus berupa karakter',
   ];

   private $validate = [
		'nama_barang' => 'required|string|max:25',
		'harga_awal' => 'required|max:20',
		'deskripsi' => 'required|string|max:100'
  ];

    protected $updatesQueryString = ['q'];

    public function reset_input(){
		$this->nama_barang = null;
		$this->harga_awal = null;
		$this->deskripsi = null;
    }

    public function create(){
		$this->createMode =  true;
    }

	public function create_mode_close(){
		$this->createMode =  false;
		$this->validate([]);
		$this->reset_input();
	}
	
	public function store(){
		$this->validate($this->validate, $this->message);
		
		Barang::create([
			'nama_barang' => $this->nama_barang,
			'harga_awal' => $this->harga_awal,
			'deskripsi_barang' => $this->deskripsi,
		]);
		
		$this->createMode = true;
		session()->flash('success', 'Data berhasil di simpan!');
		$this->reset_input();
		
	}
	
	public function edit($id){
		$this->selected_id = $id;
		$this->createMode = false;
	     $this->updateMode = true;
		$data = Barang::find($id);
		
		$this->nama_barang = $data->nama_barang;
		$this->harga_awal =  $data->harga_awal;
		$this->deskripsi = $data->deskripsi_barang;
	}
	
	public function update_mode_close(){
		$this->updateMode =  false;
		$this->validate([]);
		$this->reset_input();
	}
	
	public function update(){
		$this->validate($this->validate, $this->message);
		
		Barang::find($this->selected_id)->update([
			'nama_barang' => $this->nama_barang,
			'harga_awal' => $this->harga_awal,
			'deskripsi_barang' => $this->deskripsi,
		]);
		
		session()->flash('success', 'Data telah di edit!');
	}
	
	public function destroy($id){
		Barang::where('id', $id)->delete();
		
	     session()->flash('success', 'data telah di hapus!');
			
	}
	
	public function mulai_lelang($id){
	
		Barang::find($id)->lelang()->create([
		    'id_petugas' => Session::get('id'),
		    'status' => 'buka'
		]);
		
		session()->flash('success', 'Barang telah di lelangkan!');
	}
	
	public function tutup_lelang($id){
	     Barang::find($id)->lelang()->update([
	          'status'  => 'tutup'
	     ]);
	
	     session()->flash('success', 'Barang lelang telah di tutup!');
	}
	
	public function detail($id){
	     $data = Barang::where('id', $id)->get();
	
	     $this->detail = $data;
	     $this->createMode = false;
	     $this->updateMode = false;
		$this->detailMode = true;
	}
	
	public function closeDetail(){
		$this->detailMode = false;
	}
	
    public function render()
    {
	
	     Session::put('page', 'barang');
	   
        return view('livewire.barang-component', [
              'total_data' => Barang::all()->count(),
	    	    'barang' => Barang::where('nama_barang', 'like' , "%$this->q%")->orderBy('id', 'desc')->paginate($this->total),
      ]);
    }
	
}
   