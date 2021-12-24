
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="container">
						<div class="main-body">
							<form method="post" action="{{ route('master-school.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
								@csrf
								<div class="row">
									<div class="col-lg-4">
										<div class="card">
											<div class="card-body">
												<div class="d-flex flex-column align-items-center text-center">
													<img src="assets/images/logo_fk_pkpps.jpg" alt="Admin" class="rounded-circle p-1 bg-success" width="110" height="110">
													<div class="mt-3">
														<p class="text-secondary mb-1">Gambar</p>
														<h5>Logo Sekolah</h5>
													</div>
												</div>
												<br>
												<div class="input-group">
													<input name="inSchoolPhoto" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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
												<div class="row mb-3 position-relative">
													<label for="inSchoolName" class="col-sm-3 col-form-label">Nama PKPPS</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSchoolName" type="text" id="inSchoolName" class="form-control" value="" required/>
														<div class="invalid-tooltip">Nama tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSchoolNPSN" class="col-sm-3 col-form-label">NPSN</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSchoolNPSN" type="text" id="inSchoolNPSN" class="form-control" value="" required/>
														<div class="invalid-tooltip">NPSN tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSchoolNSP" class="col-sm-3 col-form-label">Nomor Statistik</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSchoolNSP" type="text" id="inSchoolNSP" class="form-control" value="" required/>
														<div class="invalid-tooltip">NSP tidak boleh kosong</div>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="soSchoolLevel" class="col-sm-3 col-form-label">Jenjang</label>
													<div class="col-sm-9 text-secondary">
														<select class="form-select form-control" name="soSchoolLevel" id="soSchoolLevel" >
															<option value="Ula" class="form-control">Ula</option>
															<option value="Wustha" class="form-control">Wustha</option>
															<option value="Ulya" class="form-control">Ulya</option>
														</select>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSchoolEmail" class="col-sm-3 col-form-label">Email</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSchoolEmail" type="text" id="inSchoolEmail" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inSchoolPhone" class="col-sm-3 col-form-label">Nomor Telepon</label>
													<div class="col-sm-9 text-secondary">
														<input name="inSchoolPhone" type="text" id="inSchoolPhone" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inAddress" class="col-sm-3 col-form-label">Alamat</label>
													<div class="col-sm-9 text-secondary">
														<input name="inAddress" type="text" id="inAddress" class="form-control" value="" />
													</div>
												</div>
												<div class="row mb-3 position-relative position-relative">
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
														<input name="inRT" type="text" id="inRTRW" class="form-control" value="" placeholder="001" />
													</div>
													<div class="col-sm-2 text-secondary">
														<input name="inRW" type="text" id="inSantriName" class="form-control" value="" placeholder="001" />
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inDistrict" class="col-sm-3 col-form-label">Kecamatan</label>
													<div class="col-sm-3 text-secondary">
														<input name="inDistrict" type="text" id="inDistrict" class="form-control" value="" />
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

										<!-- <div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-center">
													<div><i class="bx bx-user me-1 font-22 text-success"></i></div>
													<h5 class="mb-0 text-success">Kepala Sekolah</h5>
												</div>
												<hr>
												<div class="row mb-3 position-relative">
													<label for="soKepsek" class="col-sm-3 col-form-label">NIK Kepala Sekolah</label>
													<div class="col-sm-9 text-secondary">
														<input name="soKepsek" class="form-control" list="datalistOptionsKepsek" id="soKepsek" placeholder="Cari NIK Kepala Sekolah..." >
														<div class="invalid-tooltip">Kepala Sekolah tidak boleh kosong</div>
														<datalist id="datalistOptionsKepsek">
														@foreach ($ustadzs as $ustadz)
															<option value="{{ $ustadz->ustadz_nik }}">{{ $ustadz->ustadz_name }}</option>
														@endforeach
														</datalist>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inKepsekName" class="col-sm-3 col-form-label">Nama Lengkap</label>
													<div class="col-sm-9 text-secondary">
														<input name="inKepsekName" type="text" id="inKepsekName" class="form-control" value="" readonly/>
													</div>
												</div>
												<div class="row mb-3 position-relative">
													<label for="inKepsekEmail" class="col-sm-3 col-form-label">Email</label>
													<div class="col-sm-9 text-secondary">
														<input name="inKepsekEmail" type="text" id="inKepsekEmail" class="form-control" value="" readonly/>
													</div>
												</div>
												
											</div>
										</div> -->
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
                            url: "{{ URL::to('/') }}/master-school-add/search/" + id,
                            dataType: "JSON",
                            success: function(response){
								$('#inAddressId').val(response[0].address_id);
								$('#soVillage').val(response[0].address_village);
                                $('#inDistrict').val(response[0].address_districts);
                                $('#inKabOrCity').val(response[0].address_kab_or_city + " " + response[0].address_kab_or_city_name);
								$('#inProvince').val(response[0].address_province);
								$('#inPosCode').val(response[0].address_pos_code);
                            } ,
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    })

					// $("#soKepsek").change(function()
                    // {				
                    //     var nik = $(this).val();
                    //     $.ajax({
                    //         url: "{{ URL::to('/') }}/master-school-add/search-kepsek/" + nik,
                    //         dataType: "JSON",
                    //         success: function(response){
					// 			// alert('Tidak dapat menampilkan Data');
					// 			$('#inKepsekName').val(response[0].ustadz_name);
                    //             $('#inKepsekEmail').val(response[0].ustadz_email);
                    //         } ,
                    //         error: function() {
                    //             alert('Tidak dapat menampilkan Data');
                    //         }
                    //     });
                    // })

                </script>
                @endsection