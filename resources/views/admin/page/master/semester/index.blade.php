
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <h6 class="mb-0 text-uppercase">Daftar Semester</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Semester</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>GJL</td>
                                                <td>Ganjil</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editSemesterModal"><i class='bx bx-edit'></i>Edit</button>
                                                            @include('admin/page/master/semester/semester-edit')
                                                        </div>
                                                    </div>
											    </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>GNP</td>
                                                <td>Genap</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success px-4 ms-auto" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#editSemesterModal"><i class='bx bx-edit'></i>Edit</button>
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