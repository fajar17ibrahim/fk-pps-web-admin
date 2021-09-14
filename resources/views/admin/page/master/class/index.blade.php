
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
                            <h6 class="mb-0 text-uppercase">Daftar Kelas PKPPS MINHAAJUSHSHOOBIRIIN</h6>
                            <button type="button" class="btn btn-warning px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#addClassModal"><i class='bx bx-plus-circle mr-1'></i>Tambah Data Kelas</button>
                            @include('admin/page/master/class/class-add')
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Kelas</th>
                                                <th>Jenjang</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>136</td>
                                                <td>7 B</td>
                                                <td>Ula / SD / MI</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editClassModal"><i class='bx bx-edit'></i>Edit</button>
                                                            @include('admin/page/master/class/class-edit')
                                                        </div>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>136</td>
                                                <td>8 B</td>
                                                <td>Wustha</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                                <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editClassModal"><i class='bx bx-edit'></i>Edit</button>
                                                                @include('admin/page/master/class/class-edit')
                                                        </div>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>136</td>
                                                <td>9 A</td>
                                                <td>Ulya</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                                <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editClassModal"><i class='bx bx-edit'></i>Edit</button>
                                                                @include('admin/page/master/class/class-edit')
                                                        </div>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>136</td>
                                                <td>9 B</td>
                                                <td>Ulya</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                                <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editClassModal"><i class='bx bx-edit'></i>Edit</button>
                                                                @include('admin/page/master/class/class-edit')
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