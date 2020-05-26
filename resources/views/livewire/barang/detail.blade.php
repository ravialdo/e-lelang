<div>
	@foreach($detail as $data)
		<div class="row">
			<div class="col-6">Nama Barang <span class="float-right">:</span></div>
			<div class="col-6 mb-3">{{ $data->nama_barang }}</div>
			<div class="col-6">Deskripsi <span class="float-right">:</span></div>
			<div class="col-6 mb-3">{{ $data->deskripsi_barang }}</div>
			<div class="col-6">Harga Awal <span class="float-right">:</span></div>
			<div class="col-6 mb-3">Rp.{{ $data->rupiah($data->harga_awal) }}</div>
			<div class="col-12 text-primary font-weight-bold mb-3">
				Informasi Lelang
			</div>
				@if($data->lelang == true)
					@foreach($data->lelang as $lelang)
						<div class="col-6">Lelang dibuka<span class="float-right">:</span></div>
						<div class="col-6 mb-3">{{ $lelang->created_at->format('d-m-Y H:i') }}</div>
					     <div class="col-6">Lelang ditutup<span class="float-right">:</span></div>
						<div class="col-6 mb-3">{{ $lelang->updated_at->format('d-m-Y H:i') }}</div>
						<div class="col-6">Harga Akhir<span class="float-right">:</span></div>
						<div class="col-6 mb-3">{{ $lelang->harga_akhir == null ? 'Tidak ada penawaran harga' : 'Rp.'.$data->rupiah($lelang->harga_akhir) }}</div>
						<div class="col-6">Nama pemilik harga<span class="float-right">:</span></div>
							@if($lelang->id_masyarakat != null)
								@php
									$data_masyarakat = \App\Masyarakat::find($lelang->id_masyarakat);
								@endphp
							@endif
						<div class="col-6 mb-3">{{ $lelang->id_masyarakat != null ? $data_masyarakat->nama_lengkap : 'Nama tidak tersedia' }}</div>
					@endforeach
				@endif
		</div>
	@endforeach
	<div class="row">
		<button wire:click="closeDetail" class="btn btn-secondary mb-3 ml-auto mr-3">
			<span wire:loading wire:target="closeDetail" class="spinner-border spinner-border-sm"></span>
				Tutup
		</button>
	</div>
</div>