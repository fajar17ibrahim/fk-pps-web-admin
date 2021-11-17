
				@extends('admin.layouts.dashboard')
                
                @section('content')
                <div class="col-lg-12">
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0 text-dark">Perhatian!</h5>
                                <div class="text-dark">Sebelum melakukan pengisian data Nilai pastikan pilih <b>Mapel</b> terlebih dahulu dan menekan tombol <b>Tampilkan Data</b></div>
                            </div>
                        </div>
                    </div>

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
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mapel</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select" name="soMapelFilter" id="soMapelFilter">
                                        <option value="0">Semua</option>
                                        @foreach ($mapels as $mapel)
                                        <option value="{{ $mapel->mapel_id }}">{{ $mapel->mapel_name }}</option>
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
                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <h6 id="title" class="mb-0 text-uppercase">Input Nilai Rapor</h6>
                            <a class="ms-auto" href="report-value-settings"> 
                                <button type="button" class="btn btn-warning px-4 ms-auto"><i class='bx bx-cog mr-1'></i>Pengaturan</button>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-success radius-30" data-bs-toggle="modal" data-bs-target="#kdPengetahuanModal">Ringkasan KD Pengetahuan yang dinilai</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="kdPengetahuanModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ringkasan KD Pengetahuan yang dinilai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-sm mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">P-1</th>
                                                                <td>Kompetensi P-1 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-2</th>
                                                                <td>Kompetensi P-2 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-3</th>
                                                                <td>Kompetensi P-3 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-4</th>
                                                                <td>Kompetensi P-4 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-5</th>
                                                                <td>Kompetensi P-5 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-6</th>
                                                                <td>Kompetensi P-6 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-7</th>
                                                                <td>Kompetensi P-7 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-8</th>
                                                                <td>Kompetensi P-8 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-9</th>
                                                                <td>Kompetensi P-9 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">P-10</th>
                                                                <td>Kompetensi P-10 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-success radius-30" data-bs-toggle="modal" data-bs-target="#kdKeterampilanModal">Ringkasan KD Keterampilan yang dinilai</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="kdKeterampilanModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ringkasan KD Keterampilan yang dinilai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-sm mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">K-1</th>
                                                                <td>Kompetensi K-1 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-2</th>
                                                                <td>Kompetensi K-2 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-3</th>
                                                                <td>Kompetensi K-3 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-4</th>
                                                                <td>Kompetensi K-4 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-5</th>
                                                                <td>Kompetensi K-5 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-6</th>
                                                                <td>Kompetensi K-6 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-7</th>
                                                                <td>Kompetensi K-7 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-8</th>
                                                                <td>Kompetensi K-8 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-9</th>
                                                                <td>Kompetensi K-9 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">K-10</th>
                                                                <td>Kompetensi K-10 a. Al-Qur'an Hadist</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-success radius-30" data-bs-toggle="modal" data-bs-target="#intervalNilaiModal">Interval Nilai</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="intervalNilaiModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Interval Nilai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-sm mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <td>94 - 100</td>
                                                                <th scope="row">A</th>
                                                            </tr>
                                                            <tr>
                                                                <td>87 - 93</td>
                                                                <th scope="row">B</th>
                                                            </tr>
                                                            <tr>
                                                                <td> - 86</td>
                                                                <th scope="row">C</th>
                                                            </tr>
                                                            <tr>
                                                                <td>0 - 79</td>
                                                                <th scope="row">D</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
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
                                <form name="formReportValue" method="post" action="{{ route('report-value.store') }}" onsubmit="return validateForm()">
                                @csrf
                                <input id="inMapel" name="inMapel" type="hidden" class="form-control"/>
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-striped table-borderless">
                                            <thead class="align-middle">
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">NISN</th>
                                                    <th rowspan="2">Nama Santri</th>
                                                    <th rowspan="2">Jenis Kelamin</th>
                                                    <th rowspan="2">KKM</th>
                                                    <th colspan="10" class="text-center">Penilaian Harian</th>
                                                    <th>RPH</th>
                                                    <th>PTS</th>
                                                    <th>PAS</th>
                                                    <th rowspan="2">HPA</th>
                                                    <th rowspan="2">PRE</th>
                                                    <th rowspan="2" style="width:500px">Deskripsi</th>
                                                    <th colspan="10" class="text-center">Penilaian Keterampilan</th>
                                                    <th rowspan="2">HPA</th>
                                                    <th rowspan="2">PRE</th>
                                                    <th rowspan="2" style="width:500px">Deskripsi</th>
                                                </tr>
                                                <tr>
                                                    <th>P-1</th>
                                                    <th>P-2</th>
                                                    <th>P-3</th>
                                                    <th>P-4</th>
                                                    <th>P-5</th>
                                                    <th>P-6</th>
                                                    <th>P-7</th>
                                                    <th>P-8</th>
                                                    <th>P-9</th>
                                                    <th>P-10</th>
                                                    <th>2</th>
                                                    <th>1</th>
                                                    <th>1</th>
                                                    <th>K-1</th>
                                                    <th>K-2</th>
                                                    <th>K-3</th>
                                                    <th>K-4</th>
                                                    <th>K-5</th>
                                                    <th>K-6</th>
                                                    <th>K-7</th>
                                                    <th>K-8</th>
                                                    <th>K-9</th>
                                                    <th>K-10</th>
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
                                "url": "report-value/data/" + level + "/" + school + "/" + kelas + "/" + mapel,
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
                            url: "report-value/data/" + level + "/" + school + "/" + kelas + "/" + mapel,
                            success: function(response){
                                table.ajax.url("report-value/data/" + level + "/" + school+ "/" + kelas + "/" + mapel).load();
                                $('#inMapel').val(mapel);
                                // $('#title').text(response); 
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    };

                    // Validation
                    function validateForm() {
                        let x = document.forms["formReportValue"]["inMapel"].value;
                        if (x == "") {
                            alert("Pilih Mapel terlebih dahulu dan tekan tombol Tampilkan Data");
                            return false;
                        }
                    }

                    // Calculate
                    function calculate($index) {
                        let kkm = document.getElementsByName('inKKM[]');
                        let p1 = document.getElementsByName('inP1[]');
                        let p2 = document.getElementsByName('inP2[]');
                        let p3 = document.getElementsByName('inP3[]');
                        let p4 = document.getElementsByName('inP4[]');
                        let p5 = document.getElementsByName('inP5[]');
                        let p6 = document.getElementsByName('inP6[]');
                        let p7 = document.getElementsByName('inP7[]');
                        let p8 = document.getElementsByName('inP8[]');
                        let p9 = document.getElementsByName('inP9[]');
                        let p10 = document.getElementsByName('inP10[]');
                        let rph = document.getElementsByName('inRPH[]');
                        let pred = document.getElementsByName('inPPRE[]');
                        let kkmValue = Math.round(kkm[$index].value);
                        let p1Value = Math.round(p1[$index].value);
                        let p2Value = Math.round(p2[$index].value);
                        let p3Value = Math.round(p3[$index].value);
                        let p4Value = Math.round(p4[$index].value);
                        let p5Value = Math.round(p5[$index].value);
                        let p6Value = Math.round(p6[$index].value);
                        let p7Value = Math.round(p7[$index].value);
                        let p8Value = Math.round(p8[$index].value);
                        let p9Value = Math.round(p9[$index].value);
                        let p10Value = Math.round(p10[$index].value);
                        
                        let rphValue = Math.round((p1Value + p2Value + p3Value + p4Value + p5Value + p6Value + p7Value + p8Value  + p9Value + p10Value) / 5)
                        rph[$index].value = rphValue;
                        
                        let predInterval = Math.round((100 - kkmValue) / 3);
                        let predC = kkmValue + predInterval;
                        let predB = kkmValue + predInterval * 2;
                        let predA =  kkmValue + predInterval * 3;
                        if (rphValue < kkmValue) {
                            pred[$index].value = "D";
                        } else if (rphValue >= kkmValue && rphValue < predC) {               
                            pred[$index].value = "C";
                        } else if (rphValue >= predC && rphValue < predB) {
                            pred[$index].value = "B";
                        } else if (rphValue >= predB && rphValue <= predA) {
                            pred[$index].value = "A";
                        } else {
                            pred[$index].value = "E";
                        }
                    }

                </script>
                @endsection
									
                                    