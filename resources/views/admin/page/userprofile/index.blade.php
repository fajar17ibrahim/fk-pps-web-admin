
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="container">
						<div class="main-body">
							<div class="row">
								<div class="col-lg-4">
									<div class="card">
										<div class="card-body">
											<div class="d-flex flex-column align-items-center text-center">
												<img src="assets/images/avatars/avatar.png" alt="Admin" class="rounded-circle p-1 bg-success" width="110" height="110">
												<div class="mt-3">
													<h4>Adi Saputra</h4>
													<p class="text-secondary mb-1">Admin</p>
												</div>
											</div>
											<br>
											<div class="input-group">
												<input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
												<button class="btn btn-success" type="button" id="inputGroupFileAddon04">Upload</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="card">
										<div class="card-body">
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Nama Lengkap</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="Adi Saputra" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Email</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="adisaputra@gmail.com" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Nomor Telepon</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="(320) 380-4539" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Alamat</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="Jakarta" />
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3"></div>
												<div class="col-sm-9 text-secondary">
													<input type="button" class="btn btn-success px-4" value="Simpan Perubahan" />
												</div>
											</div>
										</div>
									</div>
								
									<div class="card">
										<div class="card-body">
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Password Lama</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Password Baru</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Ulangi Password</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="" />
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3"></div>
												<div class="col-sm-9 text-secondary">
													<input type="button" class="btn btn-success px-4" value="Perbarui Password" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                @endsection