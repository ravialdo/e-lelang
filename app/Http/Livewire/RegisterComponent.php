<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Masyarakat;

class RegisterComponent extends Component
{
	
    public $nama, $nomor_telepon, $username, $password, $konfirmasi_password, $privacy_police;
	
    public function render()
    {
        return view('livewire.register-component');
    }

    public function messages()
    {
         return [
			'required' => ':attribute tidak boleh kosong',
			'min' => ':attribute minimal harus :min karakter',
			'max'  => ':attribute maksimal harus :max karakter',
			'unique' => ':attribute ini sudah digunakan',
			'string' => ':attribute harus berupa karakter',
			'numeric' => ':attribute harus berupa angka',
			'same' => ':attribute tidak cocok',
         ];
    }

    public function validation()
    {
         return [
			'nama' => 'required|string|max:30',
			'nomor_telepon' => 'required|min:11|max:12',
			'username' => 'required|string|max:20|unique:tb_masyarakat',
			'password' => 'required|string|min:8',
			'konfirmasi_password' => 'required|min:8|same:password',
			'privacy_police' => 'accepted'
         ];
    }

    public function register()
    {
        $this->validate($this->validation(), $this->messages());

        Masyarakat::create([
             'nama_lengkap' => $this->nama,
             'username' => $this->username,
             'password' => Hash::make($this->password),
             'telp' => $this->nomor_telepon
        ]);

        return redirect()->to('/dashboard');
    }
	
}
