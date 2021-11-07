
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    @if(Session::get('user')[0]['role_id'] == 1)
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
                                    <select class="single-select" name="soLevelFilter" id="soLevelFilter">
                                        <option value="0">Semua</option>
                                        <option value="Ula">Ula</option>
                                        <option value="Wustha">Wustha</option>
                                        <option value="Ulya">Ulya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">PKPPS</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select" name="soSchoolFilter" id="soSchoolFilter">
                                        <option value="0">Semua</option>
                                        @foreach ($schools as $school)
                                        <option value="{{ $school->school_npsn }}">{{ $school->school_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="button" onclick="filter()" class="btn btn-success px-4">Tampilkan Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <h6 class="mb-0 text-uppercase">Daftar Kelas</h6>
                            @if(Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['role_id'] == 2)
                            <button type="button" class="btn btn-warning px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#addClassModal"><i class='bx bx-plus-circle mr-1'></i>Tambah Data Kelas</button>
                            @include('admin/page/master/class/class-add')
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @include('admin/page/master/class/class-edit')
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
                                    <table id="dataTable" class="table table-striped table-borderless" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Kode</th>
                                                <th>Nama Kelas</th>
                                                <th>Jenjang</th>
                                                <th>PKPPS</th>
                                                @if (Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['role_id'] == 2) 
                                                <th width="10%">Aksi</th>
                                                @endif
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
                    var level = 0;
                    var school = 0;
                    var table;
                    $(function() {
                        // Menampilkan data kelas
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "master-class/data/" + level + "/" + school,
                                "type": "GET"
                            }
                        });                    
                    });

                    // Filter
                    function filter() {				
                        level = $('#soLevelFilter').val();
                        school = $('#soSchoolFilter').val();
                        $.ajax({
                            url: "master-class/data/" + level + "/" + school,
                            success: function(response){
                                table.ajax.url("master-class/data/" + level + "/" + school).load(); 
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    };

                    // Form Edit Kelas
                    function editForm($id) {
                        url = "master-class/" + $id;
                        $('.modal-title').text('Edit Kelas');
                        $.ajax({
                            url: "master-class/" + $id + "/edit",
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                $('#editClassModal').modal('show');
                                $('.modal-title').text('Edit Kelas');
                                $('#formEdit').attr('action', url);
                                $('#inCodeEdit').val(data.id).attr('readonly','true');
                                $('#inNameEdit').val(data.name);
                                $('#soLevelEdit').val(data.level);
                                $('#soSchoolEdit').val(data.school);
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }
                    
                </script>
            @endsection