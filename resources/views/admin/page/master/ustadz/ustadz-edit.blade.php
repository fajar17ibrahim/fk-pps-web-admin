
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
													<h5>Foto</h5>
													<p class="text-secondary mb-1">Ustadz</p>
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
                                                <div><i class="bx bx-user-circle me-1 font-22 text-success"></i></div>
                                                <h5 class="mb-0 text-success">Data Ustadz</h5>
                                            </div>
                                            <hr>
											<div class="row mb-3">
												<label for="inputUstadzNISN" class="col-sm-3 col-form-label">NIP</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputUstadzNISN" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputUstadzName" class="col-sm-3 col-form-label">Nama Lengkap</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputUstadzName" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputUstadzSex" class="col-sm-3 col-form-label">Jenis Kelamin</label>
												<div class="col-sm-9 text-secondary">
													<select class="form-select form-control" id="inputUstadzSex" >
														<option value="United States" class="form-control">Laki - Laki</option>
														<option value="United States" class="form-control">Perempuan</option>
													</select>
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputUstadzPlaceBorn" class="col-sm-3 col-form-label">Tempat Lahir</label>
												<div class="col-sm-3 text-secondary">
													<input type="text" id="inputUstadzPlaceBorn" class="form-control" value="" />
												</div>
												<label for="inputUstadzPlaceBorn" class="col-sm-2 col-form-label">Tanggal Lahir</label>
												<div class="col-sm-4 text-secondary">
													<input type="date" id="inputUstadzPlaceBorn" class="form-control">
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputUstadzReligion" class="col-sm-3 col-form-label">Agama</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputUstadzReligion" class="form-control" value="Islam" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputUstadzStatus" class="col-sm-3 col-form-label">Status</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputUstadzStatus" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputUstadzAddress" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputUstadzAddress" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputUstadzPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputUstadzPhone" class="form-control" value="" />
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