
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
												<img src="assets/images/school-building.jpg" alt="Admin" class="rounded-circle p-1 bg-success" width="110" height="110">
												<div class="mt-3">
													<p class="text-secondary mb-1">Madrasah Aliyah</p>
													<h5>MA MINHAAJUSHSHOOBIRIIN</h5>
												</div>
											</div>
											<br>
											<div class="input-group">
												<input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
												<button class="btn btn-success" type="button" id="inputGroupFileAddon04">Upload</button>
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-body">
											<div class="d-flex flex-column align-items-center text-center">
												<img src="assets/images/ttd-digital.png" alt="Admin" class="rounded-circle p-1 bg-success" width="110" height="110">
												<div class="mt-3">
													<h5>TTD Digital</h5>
													<p class="text-secondary mb-1">Kepala Sekolah</p>
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
											<div class="card-title d-flex align-items-center">
                                                <div><i class="bx bx-building me-1 font-22 text-success"></i></div>
                                                <h5 class="mb-0 text-success">Informasi Umum</h5>
                                            </div>
                                            <hr>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">NIPS</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="1212312312" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Nama Sekolah</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="MA MINHAAJUSHSHOOBIRIIN" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Email</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="maminhaajushoobirin@gmail.com" />
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
											<div class="card-title d-flex align-items-center">
                                                <div><i class="bx bx-user me-1 font-22 text-success"></i></div>
                                                <h5 class="mb-0 text-success">Kepala Sekolah</h5>
                                            </div>
                                            <hr>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">NIP</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" value="1212312312" />
												</div>
											</div>
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
													<input type="text" class="form-control" value="maminhaajushoobirin@gmail.com" />
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
								</div>
							</div>
						</div>
					</div>
				</div>
                @endsection