<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo_fk_pkpps.jpg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text text-success">FK-PKPPS</h4>
        </div>
        <div class="toggle-icon ms-auto text-success"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ URL::to('/') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @if(Session::get('user')['akses'] != 4)
        <li>
            <a href="{{ URL::to('/') }}/school-profile">
                <div class="parent-icon"><i class="bx bx-building"></i>
                </div>
                <div class="menu-title">Profil PKPPS</div>
            </a>
        </li>
        @endif
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-book'></i>
                </div>
                <div class="menu-title">E-Rapor</div>
            </a>
            <ul>
                <li> <a href="{{ URL::to('/') }}/report-equipment"><i class="bx bx-right-arrow-alt"></i>Pelengkap Rapor</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/report-print"><i class="bx bx-right-arrow-alt"></i>Cetak Rapor Santri</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/report"><i class="bx bx-right-arrow-alt"></i>Input Nilai Rapor</a>
                </li>
            </ul>
        </li>
        
        <li>    
            <a href="{{ URL::to('/') }}/masterbook">
                <div class="parent-icon"><i class="bx bx-book-bookmark"></i>
                </div>
                <div class="menu-title">Buku Induk</div>
            </a>
        </li>
        @if(Session::get('user')['akses'] != 4)
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-data'></i>
                </div>
                <div class="menu-title">Master</div>
            </a>
            <ul>
                @if(Session::get('user')['akses'] == 1 || Session::get('user')['akses'] == 2)
                <li> <a href="{{ URL::to('/') }}/master-class"><i class="bx bx-right-arrow-alt"></i>Kelas</a>
                </li>
                @endif
                @if(Session::get('user')['akses'] == 1)
                <li> <a href="{{ URL::to('/') }}/master-mapel"><i class="bx bx-right-arrow-alt"></i>Mapel</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/master-school"><i class="bx bx-right-arrow-alt"></i>PKPPS</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/master-semester"><i class="bx bx-right-arrow-alt"></i>Semester</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/master-school-year"><i class="bx bx-right-arrow-alt"></i>Tahun Pelajaran</a>
                </li>
                @endif
                <li> <a href="{{ URL::to('/') }}/master-santri"><i class="bx bx-right-arrow-alt"></i>Santri</a>
                </li>
                @if(Session::get('user')['akses'] == 1 || Session::get('user')['akses'] == 2)
                <li> <a href="{{ URL::to('/') }}/master-ustadz"><i class="bx bx-right-arrow-alt"></i>Ustadz / Ustadzah</a>
                </li>
                @endif
            </ul>
        </li>
        @if(Session::get('user')['akses'] == 1 || Session::get('user')['akses'] == 2)
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-network-chart'></i>
                </div>
                <div class="menu-title">Relasi Data Master</div>
            </a>
            <ul>
                <li> <a href="{{ URL::to('/') }}/master-relation-class"><i class="bx bx-right-arrow-alt"></i>Wali Kelas</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/master-relation-mapel"><i class="bx bx-right-arrow-alt"></i>Guru Mapel</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/master-relation-admin"><i class="bx bx-right-arrow-alt"></i>Admin Jenjang</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/master-relation-headmaster"><i class="bx bx-right-arrow-alt"></i>Kepala Sekolah</a>
                </li>
            </ul>
        </li>
        @endif
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-graduation'></i>
                </div>
                <div class="menu-title">Lulusan</div>
            </a>
            <ul>
                <li> <a href="{{ URL::to('/') }}/graduation"><i class="bx bx-right-arrow-alt"></i>Lulus</a>
                </li>
                <li> <a href="{{ URL::to('/') }}/mutation"><i class="bx bx-right-arrow-alt"></i>Mutasi</a>
                </li>
            </ul>
        </li>
        @endif
        <li>
            <a href="{{ URL::to('/') }}/curriculum">
                <div class="parent-icon"><i class="bx bxs-book-open"></i>
                </div>
                <div class="menu-title">Kurikulum</div>
            </a>
        </li>
        @if(Session::get('user')['akses'] != 4)
        <li>
            <a href="{{ URL::to('/') }}/user">
                <div class="parent-icon"><i class="lni lni-users"></i>
                </div>
                <div class="menu-title">User</div>
            </a>
        </li>
        @endif
        <li class="btn btn-success">
            <a href="{{ URL::to('/') }}/download/manual-book">
                <div class="parent-icon text-white"><i class="bx bx-download"></i>
                </div>
                <div class="menu-title text-white">Manual Book</div>
            </a>
        </li>
        <li class="btn btn-primary">
            <a href="https://www.youtube.com/watch?v=IiplDjyKqZ8" target="_blank">
                <div class="parent-icon text-white"><i class="bx bx-video"></i>
                </div>
                <div class="menu-title text-white">Video Tutorial</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>