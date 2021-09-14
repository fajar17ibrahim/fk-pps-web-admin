
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
													<p class="text-secondary mb-1">Gambar</p>
													<h5>Logo Sekolah</h5>
												</div>
											</div>
											<br>
											<div class="input-group">
												<input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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
												<label for="inputLevelSchool" class="col-sm-3 col-form-label">Jenjang</label>
												<div class="col-sm-9 text-secondary" >
													<select class="form-select form-control" id="inputLevelSchool">
														<option value="United States" class="form-control">Ula / SD / MI</option>
														<option value="United States" class="form-control">Wustha / SMP / MTS</option>
														<option value="United States" class="form-control"  >Ulya / SMA / MA</option>
													</select>
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSchoolNIPS" class="col-sm-3 col-form-label">NIPS</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSchoolNIPS" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSchoolName" class="col-sm-3 col-form-label">Nama Sekolah</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSchoolName" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSchoolEmail" class="col-sm-3 col-form-label">Email</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSchoolEmail" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSchoolPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSchoolPhone" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSchoolAddress" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSchoolAddress" class="form-control" value="" />
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
												<label for="inputKepsekNIP" class="col-sm-3 col-form-label">NIP</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputKepseinputKepsekNIP" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputKepsekName" class="col-sm-3 col-form-label">Nama Lengkap</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputKepsekName" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputKepsekEmail" class="col-sm-3 col-form-label">Email</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputKepsekEmail" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputKepsekPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputKepsekPhone" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputKepsekAddress" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputKepsekAddress" class="form-control" value="" />
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3"></div>
												<div class="col-sm-9 text-secondary">
													<input type="button" class="btn btn-success px-4" value="Simpan" />
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