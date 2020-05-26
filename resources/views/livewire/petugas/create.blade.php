<div>
<div class="row">
	<div class="form-group col-md-6">
		<label>Nama Petugas</label>
			<span class="text-primary">*</span>
		<input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Petugas">
		@error('nama')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
				
	<div class="form-group col-md-6">
		<label>Level</label>
			<span class="text-primary">*</span>
		<select class="custom-select @error('id_level') is-invalid @enderror" wire:model="id_level">
			<option value="">Silahkan Pilih</option>
				@foreach($level as $data)
					<option value="{{ $data->id }}">{{ $data->level }}</option>
				@endforeach
		</select>
		@error('id_level')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
	@enderror
	</div>
</div>
	
<div class="form-group">
	<label>Username</label>
		<span class="text-primary">*</span>
	<input type="text" wire:model="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username">
	@error('username')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
	@enderror
</div>
				
<div class="form-group">
	<label>Password</label>
		<span class="text-primary">*</span>
	<input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
	@error('password')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
	@enderror
</div>
					
<div class="form-group">
	<label>Konfirmasi Password</label>
		<span class="text-primary">*</span>
	<input type="password" wire:model="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror" placeholder="Masukan Konfirmasi Password">
     @error('konfirmasi_password')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
	@enderror
</div>
           		
<button class="btn btn-primary float-right mb-4" wire:click="store">
	<span wire:loading wire:target="store" class="spinner-border spinner-border-sm"></span> Simpan
</button>

<button wire:click="create_mode_close" class="btn btn-secondary float-right mr-2">
	<span wire:loading wire:target="create_mode_close" class="spinner-border spinner-border-sm"></span> Tutup
</button>
</div>