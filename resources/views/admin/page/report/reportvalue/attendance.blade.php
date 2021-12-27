
									
									
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    @if(Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['role_id'] == 2)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <h5 class="mb-1">Filter</h5>
                                </div>
                            </div>
                            <hr>
                            <br>
                            @if(Session::get('user')[0]['role_id'] == 1)
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
										<option value="{{ $school->school_id }}">{{ $school->school_name }}</option>
										@endforeach
									</select>
                                </div>
                            </div>
                            @endif
                            @if(Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['role_id'] == 2)
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Kelas</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select" name="soKelasFilter" id="soKelasFilter">
                                        <option value="0">Semua</option>
                                        @foreach ($kelass as $kelas)
                                        <option value="{{ $kelas['id'] }}">{{ $kelas['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
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
                        <h6 class="mb-0 text-uppercase">Input Data Kehadiran Santri</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('message_success'))
                                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-white">Berhasil</h6>
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
                                                <h6 class="mb-0 text-white">Gagal!</h6>
                                                <div class="text-white">{{ Session::get('message_error') }}</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <form method="post" action="{{ route('report-attendance.store') }}">
                                @csrf
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-striped table-borderless " style="width:100%">
                                            <thead>
                                                <tr>
                                                <th rowspan="2" style="width:5%">No</th>
                                                    <th rowspan="2" style="width:20%">NIS / NISN</th>
                                                    <th rowspan="2" >Nama Santri</th>
                                                    <th rowspan="2" style="width:10%">Jenis Kelamin</th>
                                                    <th colspan="3" class="text-center">Kehadiran</th>
                                                </tr>
                                                <tr>
                                                    <th style="width:10%">S</th>
                                                    <th style="width:10%">I</th>
                                                    <th style="width:10%">A</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="d-flex align-items-center">
                                        <input type="submit" class="btn btn-success px-4  ms-auto" value="Simpan" />
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection

                @section('custom_js')
                <script>
                    var level = 0;
                    var school = 0;
                    var kelas = 0;
                    var mapel = 0;
                    var table;
                    $(function() {
                        // Menampilkan data Report Value
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "{{ URL::to('/') }}/report-attendance/data/" + level + "/" + school + "/" + kelas,
                                "type": "GET"
                            }
                        });
                    });

					// Filter
                    function filter() {				
                        level = $('#soLevelFilter').val();
                        school = $('#soSchoolFilter').val();
                        kelas = $('#soKelasFilter').val();
                        mapel = $('#soMapelFilter').val();
                        $.ajax({
                            url: "{{ URL::to('/') }}/report-attendance/data/" + level + "/" + school + "/" + kelas,
                            success: function(response){
                                table.ajax.url("{{ URL::to('/') }}/report-attendance/data/" + level + "/" + school+ "/" + kelas).load(); 
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    };

                </script>
                @endsection