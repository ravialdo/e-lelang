<div class="row">
    <div class="col-md-4 mb-3">
		
		<div class="card border-left-primary">
			<div class="card-header">
				Administrator
			</div>
			<div class="card-body">
				<i class="fas fa-user"></i>
					<span class="ml-2">
						{{ $countAdmin }}
					</span>
			</div>
		</div>
		
    </div>

	<div class="col-md-4 mb-3">
          
		<div class="card border-left-success">
			<div class="card-header">
				Petugas
			</div>
			<div class="card-body">
				<i class="fas fa-user-friends"></i>
					<span class="ml-2">
						{{ $countPetugas }}
					</span>
			</div>
		</div>
		
    </div>

	<div class="col-md-4 mb-3">
          
		<div class="card border-left-info">
			<div class="card-header">
				Masyarakat
			</div>
			<div class="card-body">
				<i class="fas fa-users"></i>
					<span class="ml-2">
						{{ $countMasyarakat }}
					</span> 
			</div>
		</div>
		
    </div>
</div>