
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <h6 class="mb-0 text-uppercase">Daftar Mata Pelajaran PKPPS MINHAAJUSHSHOOBIRIIN Kelas 7 A</h6>
                            <button type="button" class="btn btn-warning px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#addMapelModal"><i class='bx bx-plus-circle mr-1'></i>Tambah Data Mapel</button>
                            @include('admin/page/master/mapel/mapel-add')
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Mapel</th>
                                                <th>Kelompok</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>MPL01</td>
                                                <td>Bahasa Arab</td>
                                                <td>Kelompok A (Umum)</td>
                                                <td>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editMapelModal"><i class='bx bx-edit'></i>Edit</button>
                                                        @include('admin/page/master/mapel/mapel-edit')
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>MPL02</td>
                                                <td>Bahasa Indonesia</td>
                                                <td>Kelompok A (Umum)</td>
                                                <td>
                                                    <div class="col">
                                                        <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editMapelModal"><i class='bx bx-edit'></i>Edit</button>
                                                        @include('admin/page/master/mapel/mapel-edit')
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>MPL03</td>
                                                <td>Bahasa Inggris</td>
                                                <td>Kelompok A (Umum)</td>
                                                <td>
                                                    <div class="col">
                                                            <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editMapelModal"><i class='bx bx-edit'></i>Edit</button>
                                                            @include('admin/page/master/mapel/mapel-edit')
                                                        </div>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>MPL04</td>
                                                <td>Al-Qur'an</td>
                                                <td>Kelompok A (Umum)</td>
                                                <td>
                                                    <div class="col">
                                                            <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editMapelModal"><i class='bx bx-edit'></i>Edit</button>
                                                            @include('admin/page/master/mapel/mapel-edit')
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