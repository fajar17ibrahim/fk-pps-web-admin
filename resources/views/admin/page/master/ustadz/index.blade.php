
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

                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <h6 class="mb-0 text-uppercase">Daftar Ustadz PKPPS MINHAAJUSHSHOOBIRIIN</h6>
                            <a class="ms-auto" href="/master-ustadz-add"> 
                                <button type="button" class="btn btn-warning px-4 ms-auto"><i class='bx bx-plus-circle mr-1'></i>Tambah Data Ustadz</button>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>NIK</th>
                                                <th>Nama Ustadz</th>
                                                <th>L/P</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/avatars/avatar.png" alt="" class="p-1 border bg-white"  width="90" height="100">
                                                    </div>
                                                </td>
                                                <td>317505540298000</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>Surabaya</td>
                                                <td>1999-01-01</td>
                                                <td>
												    <span class="badge bg-danger text-white">Nonaktif</span>
											    </td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">Aksi</button>
                                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Details</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="/master-ustadz-edit">Edit</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Aktif</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Nonaktif</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/avatars/avatar.png" alt="" class="p-1 border bg-white"  width="90" height="100">
                                                    </div>
                                                </td>
                                                <td>317505540298000</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>Surabaya</td>
                                                <td>1999-01-01</td>
                                                <td>
												    <span class="badge bg-success text-white">Aktif</span>
											    </td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">Aksi</button>
                                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Details</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="/master-ustadz-edit">Edit</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Aktif</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Nonaktif</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/avatars/avatar.png" alt="" class="p-1 border bg-white"  width="90" height="100">
                                                    </div>
                                                </td>
                                                <td>317505540298000</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>Surabaya</td>
                                                <td>1999-01-01</td>
                                                <td>
												    <span class="badge bg-success text-white">Aktif</span>
											    </td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">Aksi</button>
                                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Details</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="/master-ustadz-edit">Edit</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Aktif</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Nonaktif</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/avatars/avatar.png" alt="" class="p-1 border bg-white"  width="90" height="100">
                                                    </div>
                                                </td>
                                                <td>317505540298000</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>Surabaya</td>
                                                <td>1999-01-01</td>
                                                <td>
												    <span class="badge bg-success text-white">Aktif</span>
											    </td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">Aksi</button>
                                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Details</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="/master-ustadz-edit">Edit</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Aktif</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Nonaktif</a>
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
                </div>
                @endsection