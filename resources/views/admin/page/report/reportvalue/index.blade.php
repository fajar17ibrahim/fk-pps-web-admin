
				@extends('admin.layouts.dashboard')

                @section('content')
				<div class="row row-cols-1 row-cols-md-3 row-cols-xl-5">
					<a href="report-value">
						<div class="col">
							<div class="card radius-10 bg-danger bg-gradient">
								<div class="card-body">
									<div class="text-center">
										<div class="widgets-icons rounded-circle mx-auto bg-white text-danger mb-3"><i class='lni lni-book'></i>
										</div>
										<h4 class="my-1 text-white">Nilai Rapor</h4>
										<p class="mb-0 text-white">UTS dan UAS</p>
									</div>
								</div>
							</div>
						</div>
					</a>
					@if(Session::get('user')[0]['role_id'] != 4)
					<a href="report-attitude">
						<div class="col">
							<div class="card radius-10 bg-primary bg-gradient">
								<div class="card-body">
									<div class="text-center">
										<div class="widgets-icons rounded-circle mx-auto bg-whte text-primary mb-3"><i class='lni lni-diamond-alt'></i>
										</div>
										<h4 class="my-1 text-white">Sikap</h4>
										<p class="mb-0 text-white">Nilai Sikap</p>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a href="report-attendance">
						<div class="col">
							<div class="card radius-10 bg-success bg-gradient">
								<div class="card-body">
									<div class="text-center">
										<div class="widgets-icons rounded-circle mx-auto bg-white text-success mb-3"><i class='lni lni-checkmark-circle'></i>
										</div>
										<h4 class="my-1 text-white">Absensi</h4>
										<p class="mb-0 text-white">Data Kehadiran</p>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a href="report-extrakurikuler">
						<div class="col">
							<div class="card radius-10 bg-warning bg-gradient">
								<div class="card-body">
									<div class="text-center">
										<div class="widgets-icons rounded-circle mx-auto bg-white text-warning mb-3"><i class='lni lni-basketball'></i>
										</div>
										<h4 class="my-1 text-white">Extrakurikuler</h4>
										<p class="mb-0 text-white">Nilai Extra Kurikuler</p>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a href="/report-achievement">
						<div class="col">
							<div class="card radius-10 bg-primary bg-gradient">
								<div class="card-body">
									<div class="text-center">
										<div class="widgets-icons rounded-circle mx-auto bg-whte text-primary mb-3"><i class='lni lni-cup'></i>
										</div>
										<h4 class="my-1 text-white">Prestasi</h4>
										<p class="mb-0 text-white">Lomba dan Prestasi</p>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<!--end row-->

				<div class="row row-cols-1 row-cols-md-3 row-cols-xl-5">
					<a href="report-homeroom-teacher-notes">
						<div class="col">
							<div class="card radius-10 bg-warning bg-gradient">
								<div class="card-body">
									<div class="text-center">
										<div class="widgets-icons rounded-circle mx-auto bg-white text-warning mb-3"><i class='lni lni-notepad'></i>
										</div>
										<h4 class="my-1 text-white">Catatan</h4>
										<p class="mb-0 text-white">Catatan Wali Kelas</p>
									</div>
								</div>
							</div>
						</div>
					</a>
					@endif
				</div>
				<!--end row-->
                @endsection