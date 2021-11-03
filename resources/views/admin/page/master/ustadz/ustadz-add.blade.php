
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="container">
						<div class="main-body">
							<form method="post" action="{{ route('master-ustadz.store') }}" class="row g-3 needs-validation" novalidate>
							@csrf
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
												<div class="row mb-3 position-relative">
													<label for="inUstadzNIK" class="col-sm-3 col-form-label">NIK</label>
													<div class="col-sm-9 text-secondary">
														<input name="inUstadzNIK" type="text" id="inUstadzNIK" class="form-control" value="" required />
														<div class="invalid-tooltip">NIK tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inUstadzName" class="col-sm-3 col-form-label">Nama Lengkap</label>
													<div class="col-sm-9 text-secondary">
														<input name="inUstadzName" type="text" id="inUstadzName" class="form-control" value="" required />
														<div class="invalid-tooltip">Nama tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soUstadzGender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
													<div class="col-sm-9 text-secondary">
														<select name="soUstadzGender" class="form-select form-control" id="soUstadzGender" >
															<option value="Laki-Laki" class="form-control">Laki-Laki</option>
															<option value="Perempuan" class="form-control">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inUstadzPlaceBorn" class="col-sm-3 col-form-label">Tempat Lahir</label>
													<div class="col-sm-3 text-secondary">
														<input name="inUstadzPlaceBorn" type="text" id="inUstadzPlaceBorn" class="form-control" value="" required />
														<div class="invalid-tooltip">Tempat Lahir tidak boleh kosong</div>
													</div>
													<label for="inUstadzDateBorn" class="col-sm-2 col-form-label">Tanggal Lahir</label>
													<div class="col-sm-4 text-secondary">
														<input name="inUstadzDateBorn" type="date" id="inUstadzDateBorn" class="form-control" required>
														<div class="invalid-tooltip">Tanggal tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inUstadzReligion" class="col-sm-3 col-form-label">Agama</label>
													<div class="col-sm-9 text-secondary">
														<input name="inUstadzReligion" type="text" id="inUstadzReligion" class="form-control" value="" required />
														<div class="invalid-tooltip">Agama tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inUstadzMotherName" class="col-sm-3 col-form-label">Nama Ibu</label>
													<div class="col-sm-9 text-secondary">
														<input name="inUstadzMotherName" type="text" id="inUstadzMotherName" class="form-control" value="" required />
														<div class="invalid-tooltip">Agama tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soUstadzProfesi" class="col-sm-3 col-form-label">Profesi</label>
													<div class="col-sm-9 text-secondary">
														<select name="soUstadzProfesi" class="form-select form-control" id="soUstadzProfesi" >
															<option value="Pendidik" class="form-control">Pendidik</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
												<label for="soUstadzEmployeeStatus" class="col-sm-3 col-form-label">Status Pegawai</label>
													<div class="col-sm-9 text-secondary">
														<select name="soUstadzEmployeeStatus" class="form-select form-control" id="soUstadzEmployeeStatus" >
															<option value="PNS" class="form-control">PNS</option>
															<option value="Non PNS" class="form-control">Non PNS</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
												<label for="soUstadzTetap" class="col-sm-3 col-form-label">Tetap / Tidak</label>
													<div class="col-sm-9 text-secondary">
														<select name="soUstadzTetap" class="form-select form-control" id="soUstadzTetap" >
															<option value="Tetap" class="form-control">Tetap</option>
															<option value="Tidak Tetap" class="form-control">Tidak Tetap</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
												<label for="soUstadzEducation" class="col-sm-3 col-form-label">Pendidikan</label>
													<div class="col-sm-9 text-secondary">
														<select name="soUstadzEducation" class="form-select form-control" id="soUstadzEducation" >
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
												<div class="row mb-3 position-relative">
												<label for="soUstadzEducationIslamic" class="col-sm-3 col-form-label">Pendidikan di Pesantren</label>
													<div class="col-sm-9 text-secondary">
														<select name="soUstadzEducationIslamic" class="form-select form-control" id="soUstadzEducationIslamic" >
															<option value="1 s/d 3 Tahun" class="form-control">1 s/d 3 Tahun</option>
															<option value="4 s/d 5 Tahun" class="form-control">4 s/d 5 Tahun</option>
															<option value="Tidak Pernah" class="form-control">Tidak Pernah</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
												<label for="soUstadzEducationAbroad" class="col-sm-3 col-form-label">Pendidikan Luar Negeri</label>
													<div class="col-sm-9 text-secondary">
														<select name="soUstadzEducationAbroad" class="form-select form-control" id="soUstadzEducationAbroad" >
															<option value="1 s/d 3 Tahun" class="form-control">1 s/d 3 Tahun</option>
															<option value="4 s/d 5 Tahun" class="form-control">4 s/d 5 Tahun</option>
															<option value="Tidak Pernah" class="form-control">Tidak Pernah</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
												<label for="soUstadzCompetence" class="col-sm-3 col-form-label">Kompetensi</label>
													<div class="col-sm-9 text-secondary">
														<select name="soUstadzCompetence" class="form-select form-control" id="soUstadzCompetence" >
															<option value="1 s/d 3 Tahun" class="form-control">Al - Qur'an</option>
															<option value="Tidak Pernah" class="form-control">Lainnya</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inUstadzEmail" class="col-sm-3 col-form-label">Email</label>
													<div class="col-sm-9 text-secondary">
														<input name="inUstadzEmail" type="text" id="inUstadzEmail" class="form-control" value="" required />
														<div class="invalid-tooltip">Email tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inUstadzPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
													<div class="col-sm-9 text-secondary">
														<input name="inUstadzPhone" type="text" id="inUstadzPhone" class="form-control" value="" required />
														<div class="invalid-tooltip">Telepon tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soPKPPS" class="col-sm-3 col-form-label">PKPPS</label>
													<div class="col-sm-9 text-secondary" >
														<select name="soPKPPS" class="form-select form-control" name="soPKPPS" id="soPKPPS">
															@foreach ($schools as $school)
															<option value="{{ $school->school_npsn }}">{{ $school->school_name }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label for="soLevelClass" class="col-sm-3 col-form-label">Di Kelas</label>
													<div class="col-sm-3 text-secondary" >
														<select name="soLevelClass" class="form-select form-control" id="soLevelClass">
														@foreach ($kelass as $kelas)
															<option value="{{ $kelas->class_id }}">{{ $kelas->class_name }}</option>
														@endforeach
														</select>
													</div>
													<label for="inSantriJoinDate" class="col-sm-3 col-form-label">Tanggal Masuk</label>
													<div class="col-sm-3 text-secondary">
														<input name="inSantriJoinDate" type="date" id="inSantriJoinDate" class="form-control">
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
												<div class="row mb-3 position-relative">
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
													<label for="inRT" class="col-sm-2 col-form-label">RT / RW</label>
													<div class="col-sm-2 text-secondary">
														<input name="inRT" type="text" id="inRT" class="form-control" placeholder="001" value="" />
													</div>
													<div class="col-sm-2 text-secondary">
														<input name="inRW" type="text" id="inRW" class="form-control" placeholder="001" value="" />
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inDistricts" class="col-sm-3 col-form-label">Kecamatan</label>
													<div class="col-sm-3 text-secondary">
														<input name="inDistricts" type="text" id="inDistricts" class="form-control" value="" />
													</div>
													<label for="inKabOrCity" class="col-sm-2 col-form-label">Kab / Kota</label>
													<div class="col-sm-4 text-secondary">
														<input name="inKabOrCity" type="text" id="inKabOrCity" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inProvince" class="col-sm-3 col-form-label">Provinsi</label>
													<div class="col-sm-3 text-secondary">
														<input name="inProvince" type="text" id="inProvince" class="form-control" value="" />
													</div>
													<label for="inPosCode" class="col-sm-2 col-form-label">Kode Pos</label>
													<div class="col-sm-4 text-secondary">
														<input name="inPosCode" type="text" id="inPosCode" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3 position-relative">
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
                                $('#inDistricts').val(response[0].address_districts);
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