
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="container">
						<div class="main-body">
							<form method="post" action="{{ route('master-santri.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
								@csrf
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
													<input name="inSantriPhoto" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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
												<div class="row mb-3 position-relative">
													<label for="inSantriNISM" class="col-sm-3 col-form-label">NISM</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSantriNISM" type="number" id="inSantriNISM" class="form-control" value="" />
														<div class="invalid-tooltip">NISM Santri tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSantriNISN" class="col-sm-3 col-form-label">NISN</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSantriNISN" type="number" id="inSantriNISN" class="form-control" value="" required/>
														<div class="invalid-tooltip">NISN Santri tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSantriName" class="col-sm-3 col-form-label">Nama Lengkap</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSantriName" type="text" id="inSantriName" class="form-control" value="" required/>
														<div class="invalid-tooltip">Nama Santri tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soSantriGender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
													<div class="col-sm-9 text-secondary">
														<select class="form-select form-control" name="soSantriGender" id="soSantriGender" >
															<option value="Laki - Laki" class="form-control">Laki-Laki</option>
															<option value="Perempuan" class="form-control">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSantriPlaceBorn" class="col-sm-3 col-form-label">Tempat Lahir</label>
													<div class="col-sm-3 text-secondary">
														<input name="inSantriPlaceBorn" type="text" id="inSantriPlaceBorn" class="form-control" value="" required/>
														<div class="invalid-tooltip">Tempat Lahir tidak boleh kosong</div>
													</div>
													<label for="inSantriDateBorn" class="col-sm-3 col-form-label">Tanggal Lahir</label>
													<div class="col-sm-3 text-secondary">
														<input name="inSantriDateBorn" type="date" id="inSantriDateBorn" class="form-control" required>
														<div class="invalid-tooltip">Pilih Tanggal Lahir</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSantriReligion" class="col-sm-3 col-form-label">Agama</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSantriReligion" type="text" id="inSantriReligion" class="form-control" value="Islam" required/>
														<div class="invalid-tooltip">Agama tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSantriHobi" class="col-sm-3 col-form-label">Hobi</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSantriHobi" type="text" id="inSantriHobi" class="form-control"/>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSantriCita" class="col-sm-3 col-form-label">Cita - Cita</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSantriCita" type="text" id="inSantriCita" class="form-control"/>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soSantriStatus" class="col-sm-3 col-form-label">Status Rumah</label>
													<div class="col-sm-9 text-secondary">
														<select class="form-select form-control" name="soSantriStatus" id="soSantriStatus" >
															<option value="Tinggal dengan Orang Tua / Wali" class="form-control">Tinggal dengan Orang Tua / Wali</option>
															<option value="Ikut Saudara / Kerabat" class="form-control">Ikut Saudara / Kerabat</option>
															<option value="Kontrak / Kos" class="form-control">Kontrak / Kos</option>
															<option value="Rumah Singgah" class="form-control">Rumah Singgah</option>
															<option value="Panti Asuhan" class="form-control">Panti Asuhan</option>
															<option value="Asrama milik Lembaga" class="form-control">Asrama milik Lembaga</option>
															<option value="Asrama bukan milik Lembaga" class="form-control">Asrama bukan milik Lembaga</option>
															<option value="Lainnya" class="form-control">Lainnya</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label for="inSantriAnakKe" class="col-sm-3 col-form-label">Anak Ke</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSantriAnakKe" type="number" id="inSantriAnakKe" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3">
													<label for="inSantriSchoolFrom" class="col-sm-3 col-form-label">Sekolah Asal</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSantriSchoolFrom" type="text" id="inSantriSchoolFrom" class="form-control" value="" />
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
													<label for="soLevelClassStart" class="col-sm-3 col-form-label">Di Kelas</label>
													<div class="col-sm-3 text-secondary" >
														<select name="soLevelClassStart" class="form-select form-control" id="soLevelClassStart">
														@foreach ($kelass as $kelas)
															<option value="{{ $kelas['id'] }}">{{ $kelas['name'] }}</option>
														@endforeach
														</select>
													</div>
													<label for="inSantriJoinDate" class="col-sm-3 col-form-label">Tanggal Masuk</label>
													<div class="col-sm-3 text-secondary">
														<input name="inSantriJoinDate" type="date" id="inSantriJoinDate" class="form-control" required>
													</div>
												</div>
												<div class="row mb-3">
													<label for="soLevelClass" class="col-sm-3 col-form-label">Kelas Sekarang</label>
													<div class="col-sm-9 text-secondary" >
														<select name="soLevelClass" class="form-select form-control" id="soLevelClass">
														@foreach ($kelass as $kelas)
															<option value="{{ $kelas['id'] }}">{{ $kelas['name'] }}</option>
														@endforeach
														</select>
													</div>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-center">
													<div><i class="bx bx-user me-1 font-22 text-success"></i></div>
													<h5 class="mb-0 text-success">Data Ayah</h5>
												</div>
												<hr>
												<div class="row mb-3 position-relative">
													<label for="inAyahNoKK" class="col-sm-3 col-form-label">No. KK</label>
													<div class="col-sm-9 text-secondary">
														<input name="inAyahNoKK" type="number" id="inAyahNoKK" class="form-control" value="" required/>
														<div class="invalid-tooltip">No. KK tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inAyahNoNIK" class="col-sm-3 col-form-label">NIK Ayah</label>
													<div class="col-sm-9 text-secondary">
														<input name="inAyahNoNIK" type="number" id="inAyahNoNIK" class="form-control" value="" required/>
														<div class="invalid-tooltip">NIK Ayah tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inAyahNama" class="col-sm-3 col-form-label">Nama Ayah</label>
													<div class="col-sm-9 text-secondary">
														<input name="inAyahNama" type="text" id="inAyahNama" class="form-control" value="" required/>
														<div class="invalid-tooltip">Nama Ayah tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soAyahJob" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
													<div class="col-sm-9 text-secondary">
														<select name="soAyahJob" class="form-select form-control" id="soAyahJob">
															<option value="Buruh (Tani / Pabrik / Bangunan)">Buruh (Tani / Pabrik / Bangunan)</option>
															<option value="Dokter / Bidan / Perawat">Dokter / Bidan / Perawat</option>
															<option value="Guru / Dosen">Guru / Dosen</option>
															<option value="Nelayan">Nelayan</option>
															<option value="Pegawai Swasta">Pegawai Swasta</option>
															<option value="Wiraswasta">Wiraswasta</option>
															<option value="Pedagang">Pedagang</option>
															<option value="PNS">PNS</option>
															<option value="Tidak Bekerja">Tidak Bekerja</option>
															<option value="Lainnya">Lainnya</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label for="soAyahEducation" class="col-sm-3 col-form-label">Pendidikan Ayah</label>
													<div class="col-sm-9 text-secondary">
														<select name="soAyahEducation" class="form-select form-control" id="soAyahEducation">
															<option value="Tidak memiliki Pendidikan Formal">Tidak memiliki Pendidikan Formal</option>
															<option value="SD / MI Sederajat">SD / MI Sederajat</option>
															<option value="SMP / MTS Sederajat">SMP / MTS Sederajat</option>
															<option value="SMA / SMK / MA Sederajat">SMA / SMK / MA Sederajat</option>
															<option value="D1">D1</option>
															<option value="D2">D2</option>
															<option value="D3">D3</option>
															<option value="D4 / S1 Sederajat">D4 / S1 Sederajat</option>
															<option value="S2">S2</option>
															<option value="S3">S3</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label for="inAyahPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
													<div class="col-sm-9 text-secondary">
														<input name="inAyahPhone" type="text" id="inAyahPhone" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3">
													<label for="soAyahSalery" class="col-sm-3 col-form-label">Penghasilan</label>
													<div class="col-sm-9 text-secondary">
														<select name="soAyahSalery" class="form-select form-control" id="soAyahSalery">
															<option value="Tidak Berpenghasilan Tetap">Tidak Berpenghasilan Tetap</option>
															<option value="< Rp. 500.000">< Rp. 500.000</option>
															<option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
															<option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
															<option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
															<option value="Rp. 4.000.000 - Rp. 5.000.000">Rp. 4.000.000 - Rp. 5.000.000</option>
															<option value="> Rp. 5.000.000">> Rp. 5.000.000</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-center">
													<div><i class="bx bx-user me-1 font-22 text-success"></i></div>
													<h5 class="mb-0 text-success">Data Ibu</h5>
												</div>
												<hr>
												<div class="row mb-3 position-relative">
													<label for="inIbuNoNIK" class="col-sm-3 col-form-label">NIK Ibu</label>
													<div class="col-sm-9 text-secondary">
														<input name="inIbuNoNIK" type="number" id="inIbuNoNIK" class="form-control" value="" required/>
														<div class="invalid-tooltip">NIK Ibu tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inIbuNama" class="col-sm-3 col-form-label">Nama Ibu</label>
													<div class="col-sm-9 text-secondary">
														<input name="inIbuNama" type="text" id="inIbuNama" class="form-control" value="" required/>
														<div class="invalid-tooltip">Nama Ibu tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soIbuJob" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
													<div class="col-sm-9 text-secondary">
														<select name="soIbuJob" class="form-select form-control" id="soIbuJob">
															<option value=""></option>
															<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
															<option value="Buruh (Tani / Pabrik / Bangunan)">Buruh (Tani / Pabrik / Bangunan)</option>
															<option value="Dokter / Bidan / Perawat">Dokter / Bidan / Perawat</option>
															<option value="Guru / Dosen">Guru / Dosen</option>
															<option value="Nelayan">Nelayan</option>
															<option value="Pegawai Swasta">Pegawai Swasta</option>
															<option value="Wiraswasta">Wiraswasta</option>
															<option value="Pedagang">Pedagang</option>
															<option value="PNS">PNS</option>
															<option value="Tidak Bekerja">Tidak Bekerja</option>
															<option value="Lainnya">Lainnya</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label for="soIbuEducation" class="col-sm-3 col-form-label">Pendidikan Ibu</label>
													<div class="col-sm-9 text-secondary">
														<select name="soIbuEducation" class="form-select form-control" id="soIbuEducation">
															<option value="Tidak memiliki Pendidikan Formal">Tidak memiliki Pendidikan Formal</option>
															<option value="SD / MI Sederajat">SD / MI Sederajat</option>
															<option value="SMP / MTS Sederajat">SMP / MTS Sederajat</option>
															<option value="SMA / SMK / MA Sederajat">SMA / SMK / MA Sederajat</option>
															<option value="D1">D1</option>
															<option value="D2">D2</option>
															<option value="D3">D3</option>
															<option value="D4 / S1 Sederajat">D4 / S1 Sederajat</option>
															<option value="S2">S2</option>
															<option value="S3">S3</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label for="inIbuPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
													<div class="col-sm-9 text-secondary">
														<input name="inIbuPhone" type="text" id="inIbuPhone" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3">
													<label for="soIbuSalery" class="col-sm-3 col-form-label">Penghasilan</label>
													<div class="col-sm-9 text-secondary">
														<select name="soIbuSalery" class="form-select form-control" id="soIbuSalery">
															<option value="Tidak Berpenghasilan Tetap">Tidak Berpenghasilan Tetap</option>
															<option value="< Rp. 500.000">< Rp. 500.000</option>
															<option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
															<option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
															<option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
															<option value="Rp. 4.000.000 - Rp. 5.000.000">Rp. 4.000.000 - Rp. 5.000.000</option>
															<option value="> Rp. 5.000.000">> Rp. 5.000.000</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-center">
													<div><i class="bx bx-user me-1 font-22 text-success"></i></div>
													<h5 class="mb-0 text-success">Data Wali</h5>
												</div>
												<hr>
												<div class="row mb-3 position-relative">
													<label for="inWaliNoKK" class="col-sm-3 col-form-label">No. KK</label>
													<div class="col-sm-9 text-secondary">
														<input name="inWaliNoKK" type="number" id="inWaliNoKK" class="form-control" value=""/>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inWaliNoNIK" class="col-sm-3 col-form-label">NIK Wali</label>
													<div class="col-sm-9 text-secondary">
														<input name="inWaliNoNIK" type="number" id="inWaliNoNIK" class="form-control" value=""/>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inWaliNama" class="col-sm-3 col-form-label">Nama Wali</label>
													<div class="col-sm-9 text-secondary">
														<input name="inWaliNama" type="text" id="inWaliNama" class="form-control" value=""/>
														<div class="invalid-tooltip">Nama Wali tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soWaliJob" class="col-sm-3 col-form-label">Pekerjaan Wali</label>
													<div class="col-sm-9 text-secondary">
														<select name="soWaliJob" class="form-select form-control" id="soWaliJob">
															<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
															<option value="Buruh (Tani / Pabrik / Bangunan)">Buruh (Tani / Pabrik / Bangunan)</option>
															<option value="Dokter / Bidan / Perawat">Dokter / Bidan / Perawat</option>
															<option value="Guru / Dosen">Guru / Dosen</option>
															<option value="Nelayan">Nelayan</option>
															<option value="Pegawai Swasta">Pegawai Swasta</option>
															<option value="Wiraswasta">Wiraswasta</option>
															<option value="Pedagang">Pedagang</option>
															<option value="PNS">PNS</option>
															<option value="Tidak Bekerja">Tidak Bekerja</option>
															<option value="Lainnya">Lainnya</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label for="soWaliEducation" class="col-sm-3 col-form-label">Pendidikan Wali</label>
													<div class="col-sm-9 text-secondary">
														<select name="soWaliEducation" class="form-select form-control" id="soWaliEducation">
															<option value="Tidak memiliki Pendidikan Formal">Tidak memiliki Pendidikan Formal</option>
															<option value="SD / MI Sederajat">SD / MI Sederajat</option>
															<option value="SMP / MTS Sederajat">SMP / MTS Sederajat</option>
															<option value="SMA / SMK / MA Sederajat">SMA / SMK / MA Sederajat</option>
															<option value="D1">D1</option>
															<option value="D2">D2</option>
															<option value="D3">D3</option>
															<option value="D4 / S1 Sederajat">D4 / S1 Sederajat</option>
															<option value="S2">S2</option>
															<option value="S3">S3</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label for="inWaliPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
													<div class="col-sm-9 text-secondary">
														<input name="inWaliPhone" type="text" id="inWaliPhone" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3">
													<label for="soWaliSalery" class="col-sm-3 col-form-label">Penghasilan</label>
													<div class="col-sm-9 text-secondary">
														<select name="soWaliSalery" class="form-select form-control" id="soWaliSalery">
															<option value="Tidak Berpenghasilan Tetap">Tidak Berpenghasilan Tetap</option>
															<option value="< Rp. 500.000">< Rp. 500.000</option>
															<option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
															<option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
															<option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
															<option value="Rp. 4.000.000 - Rp. 5.000.000">Rp. 4.000.000 - Rp. 5.000.000</option>
															<option value="> Rp. 5.000.000">> Rp. 5.000.000</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-center">
													<div><i class="bx bx-map me-1 font-22 text-success"></i></div>
													<h5 class="mb-0 text-success">Alamat Rumah</h5>
												</div>
												<hr>
												<div class="row mb-3">
													<label for="inAddress" class="col-sm-3 col-form-label">Alamat</label>
													<div class="col-sm-9 text-secondary">
														<input name="inAddress" type="text" id="inAddress" class="form-control" value="" />
													</div>
												</div>
																								
												<div class="row mb-3 position-relative">
													<label for="soVillage" class="col-sm-3 col-form-label">Desa / Kelurahan</label>
													<div class="col-sm-3 text-secondary">
														<input name="inAddressId" type="text" id="inAddressId" class="form-control" value="" hidden/>
														<input name="soVillage" class="form-control" list="datalistOptions" id="soVillage" placeholder="Cari Desa / Kelurahan..." required>
														<div class="invalid-tooltip">Desa / Kelurahan tidak boleh kosong</div>
														<datalist id="datalistOptions">
														@foreach ($address as $addressData)
															<option value="{{ $addressData->address_village . ', ' . $addressData->address_districts  }}">{{ $addressData->address_kab_or_city_name . ', ' . $addressData->address_province }}</option>
														@endforeach
														</datalist>
													</div>
													
													<label for="inRTRW" class="col-sm-2 col-form-label">RT / RW</label>
													<div class="col-sm-2 text-secondary">
														<input name="inRT" type="text" id="inRTRW" class="form-control" value="" />
													</div>
													<div class="col-sm-2 text-secondary">
														<input name="inRW" type="text" id="inSantriName" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3">
													<label for="inDistrict" class="col-sm-3 col-form-label">Kecamatan</label>
													<div class="col-sm-3 text-secondary">
														<input name="inDistrict" type="text" id="inDistrict" class="form-control" value="" />
													</div>
													<label for="inKabOrCity" class="col-sm-2 col-form-label">Kab / Kota</label>
													<div class="col-sm-4 text-secondary">
														<input name="inKabOrCity" type="text" id="inKabOrCity" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3">
													<label for="inProvince" class="col-sm-3 col-form-label">Provinsi</label>
													<div class="col-sm-3 text-secondary">
														<input name="inProvince" type="text" id="inProvince" class="form-control" value="" />
													</div>
													<label for="inPosCode" class="col-sm-2 col-form-label">Kode Pos</label>
													<div class="col-sm-4 text-secondary">
														<input name="inPosCode" type="text" id="inPosCode" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3">
													<label for="inCountry" class="col-sm-3 col-form-label">Negara</label>
													<div class="col-sm-9 text-secondary">
														<input name="inCountry" type="text" id="inCountry" class="form-control" value="Indonesia" />
													</div>
												</div>
												<div class="row">
													<div class="col-sm-3"></div>
													<div class="col-sm-9 text-secondary">
														<input type="submit" class="btn btn-success px-4" value="Simpan" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
                @endsection

				@section('custom_js')
                <script>
                    // Village ketika ada event change
                    $("#soVillage").change(function()
                    {				
                        var id = $(this).val();
                        $.ajax({
                            url: "master-santri-add/search/" + id,
                            dataType: "JSON",
                            success: function(response){
								$('#inAddressId').val(response[0].address_id);
								$('#soVillage').val(response[0].address_village);
                                $('#inDistrict').val(response[0].address_districts);
                                $('#inKabOrCity').val(response[0].address_kab_or_city_name);
								$('#inProvince').val(response[0].address_province);
								$('#inPosCode').val(response[0].address_pos_code);
                            } ,
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    })

                </script>
                @endsection