<div>
<div class="row">
	<div class="form-group col-md-6">
		<label>Nama Barang</label>
			<span class="text-primary">*</span>
		<input type="text" wire:model="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukan Nama Barang">
		@error('nama_barang')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
				
	<div class="form-group col-md-6">
		<label>Harga Awal</label>
			<span class="text-primary">*</span>
		<input type="number" wire:model="harga_awal" class="form-control @error('harga_awal') is-invalid @enderror" placeholder="contoh : 50000">
		@error('harga_awal')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>
				
<div class="form-group">
	<label>Deskripsi Barang</label>
		<span class="text-primary">*</span>
	<textarea wire:model="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukan Deskripsi Barang"></textarea>
	@error('deskripsi')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
	@enderror
</div>

 <div class="row mb-4">
	<div class="col">
		<button class="btn btn-primary float-right mb-4" wire:click="update">
			<span wire:loading wire:target="update" class="spinner-border spinner-border-sm"></span> Edit
		</button>

		<button wire:click="update_mode_close" class="btn btn-secondary float-right mr-2">
			<span wire:loading wire:target="update_mode_close" class="spinner-border spinner-border-sm"></span> Tutup
		</button>
	</div>
</div>

</div>