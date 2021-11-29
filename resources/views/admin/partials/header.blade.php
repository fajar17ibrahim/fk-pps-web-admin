		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					@if(Session::has('pkpps'))
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<h5><b class="text text-success">E-Raport</b> {{ Session::get('pkpps') . " (" . Session::get('user')[0]['class_level'] . ")" }}</h5>
						</div>
					</div>
					@endif
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifikasi</p>
										</div>
									</a>
									<div class="header-notifications-list"></div>
									<a href="javascript:;">
										<div class="text-center msg-footer">Lihat Semua Notifikasi</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Pesan</p>
										</div>
									</a>
									<div class="header-message-list">
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">Lihat Semua Pesan</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ URL::to('/') }}/images/{{ Session::get('user')[0]['ustadz_photo'] }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Session::get('user')[0]['ustadz_name'] }}</p>
								<p class="designattion mb-0">{{ roleName(Session::get('user')[0]['role_name']) }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{ URL::to('/') }}/user-profile"><i class="bx bx-user"></i><span>Profil User</span></a>
							</li>
							<li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out-circle"></i><span>Keluar</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>