
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Santri</p>
										<h4 class="my-1">{{ $santris }} Santri</h4>
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-group'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Lulusan</p>
										<h4 class="my-1">{{ $graduations }} Lulusan</h4>
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='lni lni-graduation'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Pengajar</p>
										<h4 class="my-1">{{ $ustadzs }} Ustadz(ah)</h4>
									</div>
									<div class="widgets-icons bg-light-primary text-primary ms-auto"><i class='lni lni-users'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
				
				<div class="row">
					<div class="col-xl-8">
						<div class="card radius-10">
							<div class="card-body">
								<h5 class="mb-0">Berita</h5>
							</div>
							<div class="card-body">
								@foreach ($newss as $news)
								<div class="list-group ">
									<a href="javascript:;" class="list-group-item list-group-item-action" aria-current="true">
										<h5 class="mb-2">{{ $news->news_title }}</h5>
										<p class="mb-2">{{ $news->news_description }}</small>
										<div class="d-flex w-100 justify-content-between">
											<small><i class='bx bxs-user-circle'></i> {{ $news->ustadz_name }}</small>
											<small><i class='bx bxs-calendar'></i> {{ $news->news_post_date . " " . $news->news_post_time }}</small>
										</div>
									</a>
								</div>
								<br>
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="">
										<h5 class="mb-1">Login Terakhir</h5>
									</div>
								</div>
								<hr>
							</div>
							
							<div class="product-list p-3 mb-3">
								@foreach ($logins as $login)
								<div class="row border mx-0 mb-3 py-2 radius-10 cursor-pointer">
									<div class="col-sm-12">
										<div class="d-flex align-items-center">
											<div class="">
												<img src="assets/images/avatars/avatar.png" class="rounded-circle" width="60" height="60" alt="" />
											</div>
											<div class="ms-2">
												<h6 class="mb-1"><b>{{ $login->ustadz_name }}</b></h6>
												<h6 class="mb-1">{{ roleName($login->role_name) }}</h6>
												<p class="mb-1">{{ $login->login_date }}</p>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
                @endsection