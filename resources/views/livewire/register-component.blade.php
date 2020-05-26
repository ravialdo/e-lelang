<div>
    <div class="row justify-content-center">
   <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block text-center my-auto">
				<img src="{{ asset('img/my_password.png') }}" alt="my_password.png" width="100%">
			</div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan daftar!</h1>
				@if(session('danger'))
					<div class="alert alert-danger">
						{{ session('danger') }}
					</div>
				@endif
                  </div>

				<div class="form-group">
                      <input type="text" name="nama" wire:model="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap">
				  @error('nama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                    </div>

				<div class="form-group">
                      <input type="number" name="nomor_telepon" wire:model="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" placeholder="Nomor Telepon">
				  @error('nomor_telepon')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                    </div>
				
                    <div class="form-group">
                      <input type="text" name="username" wire:model="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
				  @error('username')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                    </div>

                    <div class="form-group">
                      <input type="password" name="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
				  @error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                    </div>

                   <div class="form-group">
                      <input type="password" name="konfirmasi_password" wire:model="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror" placeholder="Konfirmasi Password">
				  @error('konfirmasi_password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" wire:model="privacy_police" class="custom-control-input @error('privacy_police') is-invalid @enderror" id="customCheck" name="privacy_police">
                        <label class="custom-control-label" for="customCheck">Privacy Police</label>
                      </div>
                    </div>

                    <button wire:click="register" class="btn btn-primary btn-block mb-3">
                      <span wire:loading wire:target="register" class="spinner-border spinner-border-sm"></span> Daftar
                    </button>

                    <a href="{{ route('login') }}">
					Sudah punya akun?
                    </a>                  
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
</div>

</div>
