<div class="row">
    <div class="col-md-12">
		<div class="card mb-3">
			<div class="card-header">
				<div class="m-0 font-weight-bold text-primary">Data Barang </div>
			</div>
			<div class="card-body">			
				
				@if(session('success'))
					<div class="alert alert-success text-center">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fas fa-check"></i> {{ session('success') }}
					</div>
				@endif
				
				@if($createMode)
					@include('livewire.barang.create')
				@elseif($updateMode)
					@include('livewire.barang.edit')
				@elseif($detailMode)
					@include('livewire.barang.detail')
				@endif
				
				@if($createMode != true)
					@if($updateMode != true && $detailMode != true)
						<button wire:click="create" class="btn btn-primary my-3">
							<span wire:loading wire:target="create" class="spinner-border spinner-border-sm"></span>
								<i class="fas fa-plus"></i> Tambah Data
						</button>
					@endif
					
					<div class="row">
						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">Menampilkan</label>
								 </div>
								<select wire:model="total" class="custom-select" id="inputGroupSelect01">
									<option value="10" selected>10 Data</option>
									<option value="20">20 Data</option>
									<option value="50">50 Data</option>
									<option value="100">100 Data</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" wire:model="q" class="form-control" placeholder="Cari data berdasarkan nama">
							</div>

						</div>
					</div>
					
				@endif				
					
			<div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
				  <th>NO</th>
                      <th>Nama Barang</th>
                      <th>Harga Awal</th>
                      <th>Deskripsi Barang</th>
                      <th>Pilihan</th>
                      <th>Lelang</th>             
                    </tr>
                  </thead>
                  <tbody>
				@php
				$i=1;
				@endphp
				@foreach($barang as $data)
                    	<tr>
	         				<th>{{ $i }}</th>
                      		<td>{{ $data->nama_barang }}</td>
                      		<td>Rp.{{ $data->rupiah($data->harga_awal) }}</td>
                      		<td>{{ $data->deskripsi_barang }}</td>
                      		<td class="p-0 text-center py-2">
							<button wire:click="edit({{ $data->id }})" class="btn btn-primary btn-sm">
								<i class="fas fa-edit"></i>
							</button>
							
							<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#destroyModal{{ $data->id }}">
								<i class="fas fa-trash"></i>
							</button>
							
							 <!-- Destroy Modal-->
   							<div class="modal fade" id="destroyModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    								<div class="modal-dialog" role="document">
      								<div class="modal-content">
        									<div class="modal-header">
          									<h5 class="modal-title" id="exampleModalLabel">
												<i class="fas fa-"></i> PERINGATAN!
											</h5>
          								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
            									<span aria-hidden="true">×</span>
          								</button>
        								</div>
        								<div class="modal-body text-left">Yakin ingin menghapus?</div>
       									<div class="modal-footer">
          									<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          									<button wire:click="destroy({{ $data->id }})" class="btn btn-success" data-dismiss="modal">
												Yakin
											</button>
        									</div>
								    </div>
 								</div>
							 </div>

						</td> 
						<td class="text-center">						
						     @if(App\Lelang::where('id_barang', $data->id)->count() == 0)
								<button wire:click="mulai_lelang({{ $data->id }})" class="btn btn-success btn-sm m-0">
									   	Buka
									</button> 
							@endif
																		
						     @foreach($data->lelang as $lelang)
								
						          @if($lelang->status == 'buka')
									<button wire:click="tutup_lelang({{ $data->id }})" class="btn btn-primary btn-sm m-0">
									   		Tutup
									</button> 
								@elseif($lelang->status == 'tutup')
									<button wire:click="detail({{ $data->id }})" class="btn btn-none btn-sm text-primary">
										Detail
									</button>
								@endif

							@endforeach
						</td>
                    	</tr>
				@php
				$i++;
				@endphp
                    @endforeach
				@if(count($barang) == 0)
					<td colspan="6" class="text-center">
						Data tidak tersedia
					</td>
				@endif
                  </tbody>
				
                </table>
			
				<div class="row">
					<div class="col-md">
						@if($total_data != 0)
							menampilkan halaman ke {{  $barang->currentPage() }} dari  {{ $barang->lastPage() }} halaman <br>
					
							@if($q != '')
								(di filter dari {{ $total_data }} total data)
							@endif
						@else
							Tidak ada data yang tersedia
						@endif
						
					</div>
					<div class="col-md">
						{{ $barang->links() }}
					</div>
				</div>
			</div>
		</div>
		
		</div>
    </div>
</div>
