
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
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Kelas</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select" name="soKelasFilter" id="soKelasFilter">
                                        <option value="0">Semua</option>
                                        @foreach ($kelass as $kelas)
                                        <option value="{{ $kelas->class_id }}">{{ $kelas->class_name }}</option>
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
                            <h6 class="mb-0 text-uppercase">Daftar Mata Pelajaran</h6>   
                            <button type="button" class="btn btn-warning px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#addMapelTeacherModal"><i class='bx bx-plus-circle mr-1'></i>Tambah Data Kelas</button>
                            @include('admin/page/masterrelation/mapel/mapel-relation-add')
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @include('admin/page/masterrelation/mapel/mapel-relation-edit')
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-borderless" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Mapel</th>
                                                <th>Nama Mapel</th>
                                                <th>Kelas</th>
                                                <th>Ustadz</th>
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
                    var class = 0;
                    var level = 0;
                    var school = 0;
                    var table;
                    $(function() {
                        // Menampilkan data Guru Mapel
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "master-relation-mapel/data/" + level + "/" + school + "/" + class,
                                "type": "GET"
                            }
                        });                    
                    });

                    // Filter
                    function filter() {				
                        level = $('#soLevelFilter').val();
                        school = $('#soSchoolFilter').val();
                        kelas = $('#soKelasFilter').val();
                        $.ajax({
                            url: "master-relation-mapel/data/" + level + "/" + school + "/" + kelas,
                            success: function(response){
                                table.ajax.url("master-relation-mapel/data/" + level + "/" + school+ "/" + kelas).load(); 
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    };

                    // Form Edit Kelas
                    function editForm($id) {
                        url = "master-relation-class/" + $id;
                        $('.modal-title').text('Edit Kelas');
                        $.ajax({
                            url: "master-relation-class/" + $id + "/edit",
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                $('#editWaliKelasModal').modal('show');
                                $('.modal-title').text('Edit Kelas');
                                $('#formEdit').attr('action', url);
                                $('#soClassName').val(data.id);
                                $('#soHomeroomTeacher').val(data.wali);
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }
                    
                </script>
                @endsection