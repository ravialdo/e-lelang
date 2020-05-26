<div class="row justify-content-center">
   <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block text-center my-auto">
				<img src="{{ asset('img/authentication.png') }}" alt="authentication.png" width="100%">
			</div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat datang, silahkan masuk!</h1>

			

				@if(session('danger'))
					<div class="alert alert-danger">
						{{ session('danger') }}
					</div>
				@endif
                  </div>

                    <div class="form-group">
					<select name="level" wire:model="level" class="form-control @error('level') is-invalid @enderror">
						<option value="">Siapakah anda?</option>
						<option value="masyarakat">Masyarakat</option>
						<option value="petugas">Petugas</option>
					</select>
					@error('level')
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
                      <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
				  @error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                      </div>
                    </div>

                    <button wire:click="login" class="btn btn-primary btn-block mb-3">
                        <span wire:loading wire:target="login" class="spinner-border spinner-border-sm"></span> Masuk
                    </button>

                    <a href="{{ route('register') }}">
					Belum punya akun?
                    </a>                  
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
</div>
