<div>
<div class="row">
	<div class="form-group col-md-6">
		<label>Nama Lengkap</label>
			<span class="text-primary">*</span>
		<input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Lengkap">
		@error('nama')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
				
	<div class="form-group col-md-6">
		<label>Nomor Telepon</label>
			<span class="text-primary">*</span>
		<input type="number" wire:model="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" placeholder="Masukan Nomor Telepon">
		@error('nomor_telepon')
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
		<sup class="text-primary">(opsional)</sup>
	<input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
	@error('password')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
	@enderror
</div>
					
<div class="form-group">
	<label>Konfirmasi Password</label>
	<input type="password" wire:model="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror" placeholder="Masukan Konfirmasi Password">
     @error('konfirmasi_password')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
	@enderror
</div>
 <div class="row mb-4">
	<div class="col">
		<button class="btn btn-primary float-right" wire:click="update">
			<span wire:loading wire:target="update" class="spinner-border spinner-border-sm"></span> Edit
	     </button>

		<button wire:click="update_mode_close" class="btn btn-secondary float-right mr-2">
     		<span wire:loading wire:target="update_mode_close" class="spinner-border spinner-border-sm"></span> Tutup
     	</button>
	</div>
</div>

</div>