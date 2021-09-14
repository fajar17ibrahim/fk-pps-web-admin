
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <h6 class="mb-0 text-uppercase">Daftar Akun User</h6>
                            <button type="button" class="btn btn-warning px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#addMapelModal"><i class='bx bx-plus-circle mr-1'></i>Tambah Data User</button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID User</th>
                                                <th>Nama Lengkap</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Nomor Telepon</th>
                                                <th>Level</th>
                                                <th>Status</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>USR01</td>
                                                <td>Adi Saputra</td>
                                                <td>adisaputra12</td>
                                                <td>adisaputra@gmail.com</td>
                                                <td>085222312333</td>
                                                <td>Admin</td>
                                                <td>
												    <span class="badge bg-success text-white">Aktif</span>
											    </td>
                                                <td>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-danger px-4 ms-auto">Nonaktifkan</button>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>USR01</td>
                                                <td>Adi Saputra</td>
                                                <td>adisaputra12</td>
                                                <td>adisaputra@gmail.com</td>
                                                <td>085222312333</td>
                                                <td>Guru</td>
                                                <td>
												    <span class="badge bg-success text-white">Aktif</span>
											    </td>
                                                <td>
                                                    <div class="col">
                                                    <button type="button" class="btn btn-danger px-4 ms-auto">Nonaktifkan</button>
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