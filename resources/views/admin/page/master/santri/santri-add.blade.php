
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
												<img src="assets/images/avatars/avatar-santri.jpg" alt="Admin" class="rounded-circle p-1 bg-success" width="110" height="110">
												<div class="mt-3">
													<h5>Foto</h5>
													<p class="text-secondary mb-1">Santri</p>
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
                                                <div><i class="bx bx-user-circle me-1 font-22 text-success"></i></div>
                                                <h5 class="mb-0 text-success">Data Santri</h5>
                                            </div>
                                            <hr>
											<div class="row mb-3">
												<label for="inputSantriNIS" class="col-sm-3 col-form-label">NIS</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriNIS" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriNISN" class="col-sm-3 col-form-label">NISN</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriNISN" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriName" class="col-sm-3 col-form-label">Nama Lengkap</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriName" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriPhone" class="col-sm-3 col-form-label">Jenis Kelamin</label>
												<div class="col-sm-9 text-secondary">
													<select class="form-select form-control" id="inputUstadzSex" >
														<option value="United States" class="form-control">Laki - Laki</option>
														<option value="United States" class="form-control">Perempuan</option>
													</select>
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriPlaceBorn" class="col-sm-3 col-form-label">Tempat Lahir</label>
												<div class="col-sm-3 text-secondary">
													<input type="text" id="inputSantriPlaceBorn" class="form-control" value="" />
												</div>
												<label for="inputSantriPlaceBorn" class="col-sm-2 col-form-label">Tanggal Lahir</label>
												<div class="col-sm-4 text-secondary">
													<input type="date" id="inputSantriPlaceBorn" class="form-control">
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriReligion" class="col-sm-3 col-form-label">Agama</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriReligion" class="form-control" value="Islam" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriStatus" class="col-sm-3 col-form-label">Status</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriStatus" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriAnakKe" class="col-sm-3 col-form-label">Anak Ke</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriAnakKe" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriAddress" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriAddress" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriPhone" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriSchoolFrom" class="col-sm-3 col-form-label">Sekolah Asal</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriSchoolFrom" class="form-control" value="" />
												</div>
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-body">
											<div class="card-title d-flex align-items-center">
                                                <div><i class="bx bx-log-in me-1 font-22 text-success"></i></div>
                                                <h5 class="mb-0 text-success">Diterima</h5>
                                            </div>
                                            <hr>
											<div class="row mb-3">
												<label for="inputLevelClass" class="col-sm-3 col-form-label">Di Kelas</label>
												<div class="col-sm-3 text-secondary" >
													<select class="form-select form-control" id="inputLevelClass">
														<option value="United States">7 A</option>
														<option value="United States">7 B</option>
														<option value="United States">7 C</option>
														<option value="United States">7 D</option>
														<option value="United States">7 E</option>
														<option value="United States">8 A</option>
														<option value="United States">8 B</option>
														<option value="United States">8 C</option>
														<option value="United States">8 D</option>
														<option value="United States">8 E</option>
														<option value="United States">9 A</option>
														<option value="United States">9 B</option>
														<option value="United States">9 C</option>
														<option value="United States">9 D</option>
														<option value="United States">9 E</option>
													</select>
												</div>
												<label for="inputSantri" class="col-sm-2 col-form-label">Tanggal Masuk</label>
												<div class="col-sm-4 text-secondary">
													<input type="date" id="inputSantriPlaceBorn" class="form-control">
												</div>
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-body">
											<div class="card-title d-flex align-items-center">
                                                <div><i class="bx bx-user me-1 font-22 text-success"></i></div>
                                                <h5 class="mb-0 text-success">Data Orang Tua</h5>
                                            </div>
                                            <hr>
											<div class="row mb-3">
												<label for="inputSantriNIS" class="col-sm-3 col-form-label">Nama Ayah</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriNIS" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriNISN" class="col-sm-3 col-form-label">Nama Ibu</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriNISN" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriName" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriName" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriSex" class="col-sm-3 col-form-label">Nomor Telepon</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriSex" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriPhone" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriPhone" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriSchoolFrom" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriSchoolFrom" class="form-control" value="" />
												</div>
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-body">
											<div class="card-title d-flex align-items-center">
                                                <div><i class="bx bx-user me-1 font-22 text-success"></i></div>
                                                <h5 class="mb-0 text-success">Wali Peserta Didik</h5>
                                            </div>
                                            <hr>
											<div class="row mb-3">
												<label for="inputSantriNIS" class="col-sm-3 col-form-label">Nama Wali</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriNIS" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriName" class="col-sm-3 col-form-label">Alamat</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriName" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriSex" class="col-sm-3 col-form-label">Nomor Telepon</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriSex" class="form-control" value="" />
												</div>
											</div>
											<div class="row mb-3">
												<label for="inputSantriPhone" class="col-sm-3 col-form-label">Pekerjaan Wali</label>
												<div class="col-sm-9 text-secondary">
													<input type="text" id="inputSantriPhone" class="form-control" value="" />
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