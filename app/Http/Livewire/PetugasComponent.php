<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Livewire\Component;
use App\Petugas;
use App\Level;
use Session;

class PetugasComponent extends Component
{
	use WithPagination;
	
    public $total = 10, $q,  $nama, $id_level, $username, $password, $konfirmasi_password, $selected_id, $level;
    public $createMode, $updateMode;
	
    private $message = [
		'required' => ':attribute tidak boleh kosong',
		'min' => ':attribute minimal harus :min karakter',
		'max'  => ':attribute maksimal harus :max karakter',
		'unique' => ':attribute ini sudah digunakan',
		'string' => ':attribute harus berupa karakter',
		'same' => ':attribute tidak cocok',
		'id_level.required' => 'anda belum memilih'
   ];

   private $validate = [
		'nama' => 'required|string|max:30',
		'username' => 'required|string|max:20|unique:tb_petugas',
		'password' => 'required|min:8',
		'konfirmasi_password' => 'required|min:8|same:password',
		'id_level' => 'required'
  ];

  protected $updatesQueryString = ['q'];

    public function reset_input(){
		$this->nama = null;
		$this->username = null;
		$this->password = null;
		$this->konfirmasi_password = null;
		$this->id_level = null;
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
		
		Petugas::create([
			'nama_petugas' => $this->nama,
			'username' => $this->username,
			'password' => Hash::make($this->password),
			'id_level' => $this->id_level
		]);
		
		$this->createMode = true;
		session()->flash('success', 'Data berhasil di simpan!');
		$this->reset_input();
		
	}
	
	public function edit($id){
		$this->selected_id = $id;
		$this->createMode = false;
	     $this->updateMode = true;
		$data = Petugas::find($id);
		
		$this->nama = $data->nama_petugas;
		$this->id_level = $data->id_level;
		$this->username = $data->username;
	}
	
	public function update_mode_close(){
		$this->updateMode =  false;
		$this->validate([]);
		$this->reset_input();
	}
	
	public function update(){
		$this->validate($this->validate =
		[
			'username' => 'required|string|max:20',
			'password' => 'nullable|min:8',
			'konfirmasi_password' => 'nullable|min:8|same:password'
		]
		, $this->message);
		
		$data = Petugas::find($this->selected_id)->update([
			'nama_petugas' => $this->nama,
			'username' => $this->username,
			'level' => $this->level
		]);
		
		if($this->password != ''){
			      $this->validate($this->validate = [
			         'konfirmasi_password' => 'required|min:8|same:password'
			     ], $this->message);
			
				Petugas::find($this->selected_id)->update([
					'password' => Hash::make($this->password)
				]);
			}
			
		session()->flash('success', 'Data telah di edit!');
	}
	
	public function destroy($id){
		Petugas::where('id', $id)->delete();
		
	      session()->flash('success', 'Data telah di hapus!');
	}
	
    public function render()
    {
	   Session::put('page', 'petugas');
	   $this->level = Level::all();
	
        return view('livewire.petugas-component', [
	    	  'total_data' => Petugas::all()->count(),
	   	  'petugas' => Petugas::where('nama_petugas', 'like' , "%$this->q%")->orderBy('id', 'desc')->paginate($this->total),
		  'level' => Level::all()
	    ]);
    }
	
}
