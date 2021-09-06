
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Santri</p>
										<h4 class="my-1">18.000 Santri</h4>
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
										<h4 class="my-1">100.000 Lulusan</h4>
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
										<h4 class="my-1">1.000 Pengajar</h4>
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
								<h5 class="mb-1 ">Pengumuman</h5>
							</div>
							<div class="card-body">
								<div class="list-group ">
									<a href="javascript:;" class="list-group-item list-group-item-action" aria-current="true">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">List group item heading</h5>
											<small>3 days ago</small>
										</div>
										<p class="mb-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..</p>	<small>Donec id elit non mi porta.</small>
									</a>
									<br>
									<a href="javascript:;" class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">List group item heading</h5>
											<small class="text-muted">3 days ago</small>
										</div>
										<p class="mb-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..</p>	<small class="text-muted">Donec id elit non mi porta.</small>
									</a>
									<br>
									<a href="javascript:;" class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">List group item heading</h5>
											<small class="text-muted">3 days ago</small>
										</div>
										<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>	<small class="text-muted">Donec id elit non mi porta.</small>
									</a>
									<br>
									<a href="javascript:;" class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">List group item heading</h5>
											<small class="text-muted">3 days ago</small>
										</div>
										<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>	<small class="text-muted">Donec id elit non mi porta.</small>
									</a>
									<br>
									<a href="javascript:;" class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">List group item heading</h5>
											<small class="text-muted">3 days ago</small>
										</div>
										<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>	<small class="text-muted">Donec id elit non mi porta.</small>
									</a>
								</div>
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
								<div class="row border mx-0 mb-3 py-2 radius-10 cursor-pointer">
									<div class="col-sm-12">
										<div class="d-flex align-items-center">
											<div class="">
												<img src="assets/images/avatars/avatar.png" class="rounded-circle" width="60" height="60" alt="" />
											</div>
											<div class="ms-2">
												<h6 class="mb-1"><b>Adnan Hanafi</b></h6>
												<h6 class="mb-1">Admin</h6>
												<p class="mb-1">2021-08-19 12:12:21</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row border mx-0 mb-3 py-2 radius-10 cursor-pointer">
									<div class="col-sm-12">
										<div class="d-flex align-items-center">
											<div class="">
												<img src="assets/images/avatars/avatar.png" class="rounded-circle" width="60" height="60" alt="" />
											</div>
											<div class="ms-2">
												<h6 class="mb-1"><b>Adnan Hanafi</b></h6>
												<h6 class="mb-1">Admin</h6>
												<p class="mb-1">2021-08-19 12:12:21</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row border mx-0 mb-3 py-2 radius-10 cursor-pointer">
									<div class="col-sm-12">
										<div class="d-flex align-items-center">
											<div class="">
												<img src="assets/images/avatars/avatar.png" class="rounded-circle" width="60" height="60" alt="" />
											</div>
											<div class="ms-2">
												<h6 class="mb-1"><b>Adnan Hanafi</b></h6>
												<h6 class="mb-1">Admin</h6>
												<p class="mb-1">2021-08-19 12:12:21</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row border mx-0 mb-3 py-2 radius-10 cursor-pointer">
									<div class="col-sm-12">
										<div class="d-flex align-items-center">
											<div class="">
												<img src="assets/images/avatars/avatar.png" class="rounded-circle" width="60" height="60" alt="" />
											</div>
											<div class="ms-2">
												<h6 class="mb-1"><b>Gilang Heru Kencana</b></h6>
												<h6 class="mb-1">Admin</h6>
												<p class="mb-1">2021-08-19 12:12:21</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-8">
						<div class="card bg-success text-white">
							<div class="card-body">
								<h5 class="card-title text-white">Informasi dari Pengembang</h5>
								<p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
                @endsection