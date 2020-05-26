<div>
	<div class="text-uppercase mb-3">
		history lelang
		<hr class="border-primary"/>
	</div>

<div class="row">
	<div class="col-md-6">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="inputGroupSelect01">Kategori</label>
			</div>
				<select wire:model="status" class="custom-select" id="inputGroupSelect01">
					<option value="buka" selected>Dibuka</option>
					<option value="tutup">Ditutup</option>
				</select>
			</div>
		</div>
	</div>

<div class="row">
    @foreach($lelang as $data)
    		<div class="col-md-4 mb-4">
			<div class="card shadow">
				<div class="card-header text-capitalize text-primary font-weight-bold">
					{{ str_limit($data->barang->nama_barang, 15) }}
					 	<span class="badge {{ $data->status == 'buka' ? 'badge-primary' : 'badge-danger' }} float-right text-lowercase badge-sm">di{{ $data->status }}</span>
				</div>
				<div class="card-body text-center">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTP95_ntgRYnvcugwNdQOWeLorkmlTxSXte6QiKIHVQMLJD_-z9&usqp=CAU" height="150"  alt="gambar.jpg">
				     <div class="mb-3 text-left">
					     Rp.{{ $data->barang->rupiah($data->barang->harga_awal) }} <br/>
						{{ str_limit($data->barang->deskripsi_barang, 45) }}
					</div>
					<button wire:click="history({{ $data->id }})" class="btn btn-outline-primary">
						 Lihat History
					</button>
				</div>
			</div>
   		</div>
   @endforeach
</div>

<div class="row justify-content-center">
	<div class="float-right">
    		{{ $lelang->links() }}
	</div>
</div>
</div>