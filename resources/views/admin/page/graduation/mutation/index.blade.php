
									
									
				@extends('admin.layouts.dashboard')

				@section('content')
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div class="">
									<h5 class="mb-1">Filter</h5>
								</div>
							</div>
							<hr>
							<br>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Jenjang</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<select class="single-select">
										<option value="United States">Ula</option>
										<option value="United States">Wustha</option>
										<option value="United States">Ulya</option>
									</select>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">PKPPS</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<select class="single-select">
										<option value="United States">MINHAAJUSHSHOOBIRIIN</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" class="btn btn-success px-4" value="Tampilkan Data" />
								</div>
							</div>
						</div>
					</div>
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<h6 class="mb-0 text-uppercase">Data Mutasi Santri</h6>
						<a class="ms-auto" href="/graduation-add"> 
                                <button type="button" class="btn btn-warning px-4 ms-auto"><i class='bx bx-plus-circle mr-1'></i>Tambah Data Kelulusan</button>
						</a>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>NSM / NPSN</th>
											<th>Nama Santri</th>
											<th>L/P</th>
											<th>Melanjutkan / Tidak</th>
											<th>Sekolah Asal</th>
											<th>Sekolah Tujuan</th>
											<th>Alasan Tidak Melanjutkan</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>510031750032 / 69985167</td>
											<td>EKO RAPORT</td>
											<td>L</td>
											<td>
												<span class="badge bg-warning text-dark">Melanjutkan</span>
											</td>
											<td>Ula Nurul Huda</td>
											<td>SMPN 5 Jakarta</td>
											<td></td>
											<td>
												<div class="col">
													<div class="btn-group">
														<button type="button" class="btn btn-success">Aksi</button>
														<button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">Edit</a>
															</li>
															<li><a class="dropdown-item" href="#">Hapus</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>1</td>
											<td>510031750032 / 69985167</td>
											<td>EKO RAPORT</td>
											<td>L</td>
											<td>
												<span class="badge bg-danger">Tidak Melanjutkan</span>
											</td>
											<td>Ula Nurul Huda</td>
											<td></td>
											<td>Pindah Rumah</td>
											<td>
												<div class="col">
													<div class="btn-group">
														<button type="button" class="btn btn-success">Aksi</button>
														<button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="#">Edit</a>
															</li>
															<li><a class="dropdown-item" href="#">Hapus</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				@endsection