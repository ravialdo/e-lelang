<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Livewire\Component;
use App\Masyarakat;
use Session;

class MasyarakatComponent extends Component
{
    use WithPagination;
	
    public $total = 10, $q,  $nama, $nomor_telepon, $username, $password, $konfirmasi_password, $selected_id;
    public $createMode, $updateMode;
	
    private $message = [
		'required' => ':attribute tidak boleh kosong',
		'min' => ':attribute minimal harus :min karakter',
		'max'  => ':attribute maksimal harus :max karakter',
		'unique' => ':attribute ini sudah digunakan',
		'string' => ':attribute harus berupa karakter',
		'same' => ':attribute tidak cocok',
   ];

   private $validate = [
		'nama' => 'required|string|max:30',
		'nomor_telepon' => 'required|min:11|max:12',
		'username' => 'required|string|max:20|unique:tb_masyarakat',
		'password' => 'required|min:8',
		'konfirmasi_password' => 'required|min:8|same:password',
  ];

  protected $updatesQueryString = ['q'];

    public function reset_input(){
		$this->nama = null;
		$this->nomor_telepon = null;
		$this->username = null;
		$this->password = null;
		$this->konfirmasi_password = null;
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
		
		Masyarakat::create([
			'nama_lengkap' => $this->nama,
			'telp' => $this->nomor_telepon,
			'username' => $this->username,
			'password' => Hash::make($this->password)
		]);
		
		$this->createMode = true;
		session()->flash('success', 'Data berhasil di simpan!');
		$this->reset_input();
		
	}
	
	public function edit($id){
		$this->selected_id = $id;
		$this->createMode = false;
	     $this->updateMode = true;
		$data = Masyarakat::find($id);
		
		$this->nama = $data->nama_lengkap;
		$this->nomor_telepon = $data->telp;
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
		
		$data = Masyarakat::find($this->selected_id)->update([
			'nama_lengkap' => $this->nama,
			'telp' => $this->nomor_telepon,
			'username' => $this->username
		]);
		
		if($this->password != ''){
			     $this->validate($this->validate = [
			         'konfirmasi_password' => 'required|min:8|same:password'
			     ], $this->message);
			
				Masyarakat::find($this->selected_id)->update([
					'password' => Hash::make($this->password)
				]);
			}
			
		session()->flash('success', 'Data telah di edit!');
	}
	
	public function destroy($id){
		$state = Masyarakat::where('id', $id)->delete();
		
	     session()->flash('success', 'data telah di hapus!');
			
	}
	
    public function render()
    {
	   Session::put('page', 'masyarakat');
        return view('livewire.masyarakat-component', [
		  'total_data' => Masyarakat::all()->count(),
	   	  'masyarakat' => Masyarakat::where('nama_lengkap', 'like' , "%$this->q%")->orderBy('id', 'desc')->paginate($this->total)
	   ]);
    }
	
}
