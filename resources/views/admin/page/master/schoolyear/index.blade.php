
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <h6 class="mb-0 text-uppercase">Daftar Tahun Pelajaran</h6>
                            <button type="button" class="btn btn-warning px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#addSchoolYearModal"><i class='bx bx-plus-circle mr-1'></i>Tambah Data Tahun Pelajaran</button>
                            @include('admin/page/master/schoolyear/schoolyear-add')
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @include('admin/page/master/schoolyear/schoolyear-edit')
                                @if(Session::has('message_success'))
                                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-white">Berhasil Update Data</h6>
                                                <div class="text-white">{{ Session::get('message_success') }}</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if(Session::has('message_error'))
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-white">Gagal Update Data!</h6>
                                                <div class="text-white">{{ Session::get('message_error') }}</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Kode</th>
                                                <th>Nama Tahun Pelajaran</th>
                                                <th>Semester</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection

                @section('custom_js')
                <script>
                    var table;
                    var status = 0;
                    $(function() {
                        // Menampilkan data Tahun Pelajaran
                        table = $('#dataTable').DataTable({
                            columns: [{
                                title: "No"
                            }, {
                                title: "Kode"
                            }, {
                                title: "Nama Tahun Pelajaran"
                            }, {
                                title: "Semester"
                            }, {
                                title: "Aksi"
                            }],
                            ajax: {
                                "url": "master-school-year/data",
                                "type": "GET"
                            }
                        });
                    
                    });

                    // Form Edit Tahun Pelajaran
                    function editForm($id) {
                        url = "master-school-year/" + $id;
                        $('.modal-title').text('Edit Tahun Pelajaran');
                        $.ajax({
                            url: "master-school-year/" + $id + "/edit",
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                $('#editSchoolYearModal').modal('show');
                                $('.modal-title').text('Edit Tahun Pelajaran');
                                $('#formEdit').attr('action', url);
                                $('#inCodeEdit').val(data.id).attr('readonly','true');
                                $('#inNameEdit').val(data.name);
                                $('#soSemesterEdit').val(data.semester);
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }
                    
                </script>
                @endsection