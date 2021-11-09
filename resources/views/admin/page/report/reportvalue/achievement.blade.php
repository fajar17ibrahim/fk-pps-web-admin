
									
									
									
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
										<option value="{{ $school->school_npsn }}">{{ $school->school_name }}</option>
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
                                        <option value="{{ $kelas->class_id }}">{{ $kelas->class_name }}</option>
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
                        <h6 class="mb-0 text-uppercase">Input Nilai Prestasi</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                            <th rowspan="2">No</th>
                                                <th rowspan="2">NSM / NPSN</th>
                                                <th rowspan="2">Nama Santri</th>
                                                <th rowspan="2">L/P</th>
                                                <th colspan="2" class="text-center">Prenstasi 1</th>
                                                <th colspan="2" class="text-center">Prenstasi 2</th>
                                                <th colspan="2" class="text-center">Prenstasi 3</th>
                                            </tr>
                                            <tr>
                                                <th>Jenis Prestasi</th>
                                                <th>Keterangan</th>
                                                <th>Jenis Prestasi</th>
                                                <th>Keterangan</th>
                                                <th>Jenis Prestasi</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>510031750032 / 69985167</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>
                                                    <select class="single-select">
                                                        <option value="United States">Kesenian</option>
                                                        <option value="United States">Keagamaan</option>
                                                    </select>
                                                </td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td>
                                                    <select class="single-select">
                                                        <option value="United States">Kesenian</option>
                                                        <option value="United States">Keagamaan</option>
                                                    </select>
                                                </td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td>
                                                    <select class="single-select">
                                                        <option value="United States">Kesenian</option>
                                                        <option value="United States">Keagamaan</option>
                                                    </select>
                                                </td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="d-flex align-items-center">
                                    <input type="button" class="btn btn-success px-4  ms-auto" value="Simpan" />
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
                    var kelas = 0;
                    var table;
                    $(function() {
                        // Menampilkan data Santri
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "report-achievement/data/" + level + "/" + school + "/" + kelas,
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
                            url: "report-achievement/data/" + level + "/" + school + "/" + kelas,
                            success: function(response){
                                table.ajax.url("report-achievement/data/" + level + "/" + school+ "/" + kelas).load(); 
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    };

                </script>
                @endsection