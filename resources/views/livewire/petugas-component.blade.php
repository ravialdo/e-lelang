<div class="row">
    <div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="m-0 font-weight-bold text-primary">Data Petugas</div>
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
					@include('livewire.petugas.create')
				@elseif($updateMode)
					@include('livewire.petugas.edit')
				@endif
				
				@if($createMode != true)
					@if($updateMode != true)
						<button wire:click="create" class="btn btn-primary my-3">
							<span wire:loading wire:target="create" class="spinner-border spinner-border-sm"></span>
								<i class="fas fa-user-plus"></i> Tambah Data
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
                      <th>Nama Petugas</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Pilihan</th>                   
                    </tr>
                  </thead>
                  <tbody>
				@php
				$i=1;
				@endphp
				@foreach($petugas as $data)
                    	<tr>
	         				<th>{{ $i }}</th>
                      		<td>{{ $data->nama_petugas }}</td>
                      		<td>{{ $data->username }}</td>
                      		<td>{{ $data->level->level }}</td>
                      		<td class="p-0 text-center py-2">
							<button wire:click="edit({{ $data->id }})" class="btn btn-primary btn-sm">
								<i class="fas fa-edit"></i>
							</button>
							
							@if($data->id != session('id'))
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#destroyModal{{ $data->id }}">
									<i class="fas fa-trash"></i>
								</button>
							@endif
							
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
                    	</tr>
				@php
				$i++;
				@endphp
                    @endforeach
				@if(count($petugas) == 0)
					<td colspan="5" class="text-center">
						Data tidak tersedia
					</td>
				@endif
                  </tbody>
				
                </table>
			
				<div class="row">
					<div class="col-md">
						@if($total_data != 0)
							menampilkan halaman ke {{  $petugas->currentPage() }} dari  {{ $petugas->lastPage() }} halaman <br>
					
							@if($q != '')
								(di filter dari {{ $total_data }} total data)
							@endif
						@else
							Tidak ada data yang tersedia
						@endif
						
					</div>
					<div class="col-md">
						{{ $petugas->links() }}
					</div>
				</div>
			</div>
		</div>
		
		</div>
    </div>
</div>
