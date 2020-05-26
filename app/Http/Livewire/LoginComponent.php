<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Masyarakat;
use App\Petugas;
use Session;

class LoginComponent extends Component
{
	
    public $username, $password, $level;
    public $data;

    public function render()
    {
        return view('livewire.login-component');
    }

    public function messages()
    {
        return [
           'required' => ':attribute tidak boleh kosong',
           'min' => ':attribute minimal harus :min karakter',
           'max' => ':attribute masksimal harus :max karakter',
           'level.required' => 'anda belum memilih'
       ];
    }

    public function validation()
    {
        return [
            'level' => 'required',
            'username' => 'required|max:20',
            'password' => 'required|min:8'
        ];
    }

    public function login()
    {
	   $this->validate($this->validation(), $this->messages());
	   $this->state = true;
	
	   if($this->level == 'masyarakat'){
		
		       
            	  $check = Masyarakat::where('username', $this->username)->get();

                 if(count($check) != 0){
	
				 foreach($check as $data){
				      $password = $data->password;
				  }
				
				  if(Hash::check($this->password, $password)){
						foreach($check as $data){
							Session::put('id', $data->id);
							Session::put('nama', $data->nama);
							Session::put('username', $data->username);
							Session::put('telp', $data->telp);
						}
					
						return redirect()->to('/dashboard');		
					}else{
						session()->flash('danger', 'password yang anda masukan salah!');
					}
				
	            }else{
			  	  session()->flash('danger', 'username yang anda masukan salah!');
	            }
	
            }elseif($this->level == 'petugas'){
	
	            //$this->loading = true;
	            $check = Petugas::where('username', $this->username)->get();

                 if(count($check) != 0){
	
				 foreach($check as $data){
				      $password = $data->password;
				  }
				
				  if(Hash::check($this->password, $password)){
						foreach($check as $data){
							Session::put('id', $data->id);
							Session::put('nama', $data->nama);
							Session::put('username', $data->username);
							Session::put('level', $data->level);
						}
					
						return redirect()->to('/dashboard');		
					}else{
						session()->flash('danger', 'password yang anda masukan salah!');
					}
				
	            }else{
			  	  session()->flash('danger', 'username yang anda masukan salah!');
	            }
	
	       }
	
    }


}
