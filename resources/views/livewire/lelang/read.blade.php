<div>
	@foreach($read as $data)
		<!-- card -->
		<div class="card mb-5 pb-5">
			<!-- card header -->
			<div class="card-header">
			      <!-- button -->
				<button wire:click="closeRead" class="btn btn-light btn-sm">
					<i class="fas fa-arrow-left"></i>
				</button>
					{{ $data->barang->nama_barang }}
			</div>
			<!-- /end card header -->
			
			<!-- card body -->
			<div class="card-body">
			
			      <!-- row -->
	                <div class="row my-5">
					<div class="col-md-6 text-center">
						<!-- image -->
	                    	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTP95_ntgRYnvcugwNdQOWeLorkmlTxSXte6QiKIHVQMLJD_-z9&usqp=CAU" class="img-fluid" alt="{{ $data->barang->nama_barang }}.jpg"/>
					</div>
					<div class="col-md-6">
					
						<!-- text product -->
						<div class="ml-3">
							<div class="text-primary font-weight-bold">
								Deskripsi
							</div>
								<p class="mb-5">{{ $data->barang->deskripsi_barang }}</p>
							<div class="text-primary font-weight-bold">
								Harga Awal
							</div>
								<p class="mb-5">Rp.{{ $data->barang->rupiah($data->barang->harga_awal) }}</p>
							<div class="text-primary font-weight-bold">
								Harga Tertinggi
							</div>
								<p>Rp.{{ $hargaTertinggi == '' ? '-' : $data->barang->rupiah($hargaTertinggi) }}</p>
						</div>
						<!-- end text product -->
						
					</div>
					
		
					
					</div>
				</div>
				<!-- /end row -->
				
				<!-- button komentar  & lelang-->
					<div class="ml-2 my-2">
						<button wire:click="comments" class="btn btn-{{ $colorComment }}">
							Komentar <span class="badge badge-primary">0</span>
						</button>
						<button wire:click="lelang"class="btn btn-{{ $colorLelang }}">
							Lelang <span class="badge badge-primary">{{ $totalTawaran }}</span>
						</button>		
						
						
						<div class="ml-2  mt-3">						
							@if($commentTab)
								<div class="my-3">
									Tidak ada komentar
								</div>
								
								<div class="mr-3">
									<div class="form-group my-3">
										<textarea rows="3" wire:model="" class="form-control" placeholder="Tulis komentar disini"></textarea>
									</div>
								
									<button wire:click="" class="btn btn-outline-primary float-right">
										<i class="fas fa-paper-plane"></i> Kirim
									</button>
								</div>
							@elseif($lelangTab)
								
								@if($hargaTertinggi)
									@foreach($data->history as $history)
										<div class="media">
											<img src="{{ asset('img/avatar.png') }}" width="30px" class="mr-3 rounded-circle" alt="...">
												<div class="media-body"> <h5 class="mt-0"> {{ $history->masyarakat->username }} </h5>
													<p> menawarkan harga sebesar Rp.{{ $history->barang->rupiah($history->penawaran_harga) }}</p>
												</div>
										</div>
									@endforeach
								@else
									<div class="my-3">
										Tidak ada tawaran harga
									</div>
								@endif
								
								<!-- form price -->
								<input wire:model="hargaAwal" type="hidden" value="{{ $data->barang->harga_awal <= $hargaTertinggi ? $hargaTertinggi : $data->barang->harga_awal }}">
								
								@if(session('danger'))
									<div class="alert alert-danger alert-sm mr-3 text-center">
										{{ session('danger') }}
									</div>
								@endif

								<div class="mr-3">
									<div class="form-group my-3">
										<input wire:model="hargaAkhir" type="number" class="form-control @error('hargaAkhir') is-invalid @enderror" placeholder="Contoh : 50000">
									</div>
								
									<button wire:click="addPrice({{ $data->id }})" class="btn btn-outline-primary float-right">
										<i class="fas fa-paper-plane"></i> Kirim
									</button>
								</div>
							@endif
				
			</div>
		</div>
		<!-- /end card -->
	@endforeach
</div>

