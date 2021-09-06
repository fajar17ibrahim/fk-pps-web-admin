
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
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="button" class="btn btn-success px-4" value="Tampilkan Data" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <h6 class="mb-0 text-uppercase">Daftar Pondok Pesantren</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Informasi Pondok Pesantren</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Email</th>
                                                <th>Logo</th>
                                                <th>TTD Kepsek</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>MA MINHAAJUSHSHOOBIRIIN<br>
                                                    NIPS : 232131232<br>
                                                    Kepsek : Adi Saputra<br>
                                                    NIP : 1212321312212
                                                </td>
                                                <td>Surabaya</td>
                                                <td>(0335) 2342 234</td>
                                                <td>maminhaajushoobirin@gmail.com</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/logo_fk_pkpps.jpg" alt="" class="p-1 border bg-white"  width="90" height="90">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/ttd-digital.png" alt="" class="p-1 border bg-white"  width="90" height="90">
                                                    </div>
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
                                                <td>MA MINHAAJUSHSHOOBIRIIN<br>
                                                    NIPS : 232131232<br>
                                                    Kepala : Adi Saputra<br>
                                                    NIP : 1212321312212
                                                </td>
                                                <td>Surabaya</td>
                                                <td>(0335) 2342 234</td>
                                                <td>maminhaajushoobirin@gmail.com</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/logo_fk_pkpps.jpg" alt="" class="p-1 border bg-white"  width="90" height="90">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/ttd-digital.png" alt="" class="p-1 border bg-white"  width="90" height="90">
                                                    </div>
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
                                                <td>MA MINHAAJUSHSHOOBIRIIN<br>
                                                    NIPS : 232131232<br>
                                                    Kepala : Adi Saputra<br>
                                                    NIP : 1212321312212
                                                </td>
                                                <td>Surabaya</td>
                                                <td>(0335) 2342 234</td>
                                                <td>maminhaajushoobirin@gmail.com</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/logo_fk_pkpps.jpg" alt="" class="p-1 border bg-white"  width="90" height="90">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/ttd-digital.png" alt="" class="p-1 border bg-white"  width="90" height="90">
                                                    </div>
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
                                                <td>MA MINHAAJUSHSHOOBIRIIN<br>
                                                    NIPS : 232131232<br>
                                                    Kepala : Adi Saputra
                                                </td>
                                                <td>Surabaya</td>
                                                <td>(0335) 2342 234</td>
                                                <td>maminhaajushoobirin@gmail.com</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/logo_fk_pkpps.jpg" alt="" class="p-1 border bg-white"  width="90" height="90">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/ttd-digital.png" alt="" class="p-1 border bg-white"  width="90" height="90">
                                                    </div>
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