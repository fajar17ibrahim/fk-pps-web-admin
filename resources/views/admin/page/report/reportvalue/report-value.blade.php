
				@extends('admin.layouts.dashboard')
                
                @section('content')
                <div class="col-lg-12">
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0 text-dark">Perhatian!</h5>
                                <div class="text-dark">1. Sebelum melakukan pengisian data Nilai pastikan pilih <b>Mapel</b> terlebih dahulu dan menekan tombol <b>Tampilkan Data</b>. 
                                <br>2. Jika belum melakukan input <b>KD Pengetahuan dan Keterampilan</b> silahkan masuk ke menu <b>Pengaturan.</b></div>
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
                                                    <table id="tbKdP" class="table table-sm mb-0">
                                                        <tbody>
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
                                                    <table id="tbKdK" class="table table-sm mb-0">
                                                        <tbody>
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
                                                    <th rowspan="2">RPK</th>
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
                                        <input type="submit" class="btn btn-success px-4 ms-auto" value="Simpan" />
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
                    var table, tableKDP, tableKDK;
                    $(function() {
                        // Menampilkan data Report Value
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "{{ URL::to('/') }}/report-value/data/" + level + "/" + school + "/" + kelas + "/" + mapel,
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
                            url: "{{ URL::to('/') }}/report-value/data/" + level + "/" + school + "/" + kelas + "/" + mapel,
                            success: function(response){
                                // alert(response.length);
                                if (response != "error_mapel") {
                                    table.ajax.url("{{ URL::to('/') }}/report-value/data/" + level + "/" + school+ "/" + kelas + "/" + mapel).load();
                                    showKD()
                                    $('#inMapel').val(mapel);
                                    let mapelName = $("#soMapelFilter option:selected").text();
                                    if (mapelName != "Semua") {
                                        $('#title').text("Input Nilai Raport Mapel " + mapelName); 
                                    } else {
                                        $('#title').text("Input Nilai Raport"); 
                                    }
                                } else {
                                    alert('Mapel tidak ditemukan dikelas ini!');
                                    location.reload();
                                }
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                                
                            }
                        });
                    };

                    function showKD() {				
                        $.ajax({
                            url: "{{ URL::to('/') }}/report-value/data/kdk",
                            success: function(response){
                                var content = '';
                                for (i = 0; i <= response.length - 1; i++) {
                                    content += '<tr><th width="15%" name="thSkillsId" scope="row">K - ' + response[i].id + '</th><td id="k' + response[i].id + '">' + response[i].deskripsi + '</td></tr>';
                                };
                                $('#tbKdK > tbody:last-child').html(content);

                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });

                        $.ajax({
                            url: "{{ URL::to('/') }}/report-value/data/kdp",
                            success: function(response){
                                var content = '';
                                for (i = 0; i <= response.length - 1; i++) {
                                    content += '<tr><th width="15%" name="thKnowledgeId" scope="row">P - ' + response[i].id + '</th><td id="p' + response[i].id + '">' + response[i].deskripsi + '</td></tr>';
                                };
                                $('#tbKdP > tbody:last-child').html(content);

                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    };

                    // Validation
                    function validateForm() {
                        let x = document.forms["formReportValue"]["inMapel"].value;
                        if (x == "" || x == "0") {
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
                        let pts = document.getElementsByName('inPTS[]');
                        let pas = document.getElementsByName('inPAS[]');
                        let hpa = document.getElementsByName('inHPA[]');
                        let pred = document.getElementsByName('inPPRE[]');
                        let pDesc = document.getElementsByName('taDailyDesc[]');
                        
                        let k1 = document.getElementsByName('inK1[]');
                        let k2 = document.getElementsByName('inK2[]');
                        let k3 = document.getElementsByName('inK3[]');
                        let k4 = document.getElementsByName('inK4[]');
                        let k5 = document.getElementsByName('inK5[]');
                        let k6 = document.getElementsByName('inK6[]');
                        let k7 = document.getElementsByName('inK7[]');
                        let k8 = document.getElementsByName('inK8[]');
                        let k9 = document.getElementsByName('inK9[]');
                        let k10 = document.getElementsByName('inK10[]');
                        let krpk = document.getElementsByName('inRPK[]');
                        let kPred = document.getElementsByName('inKPRE[]');
                        let kDesc = document.getElementsByName('taSkillsDesc[]');

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
                        let ptsValue = Math.round(pts[$index].value);
                        let pasValue = Math.round(pas[$index].value);

                        let rphValueCount = 0;
                        let rphValue = 0;
                        let sKDKnowledge = "";
                        if (p1Value != "") {
                            rphValueCount++;
                            rphValue += p1Value;
                            var desc = document.getElementById("p1").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        }
                        
                        if (p2Value != "") {
                            rphValueCount++;
                            rphValue += p2Value;
                            var desc = document.getElementById("p2").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        if (p3Value != "") {
                            rphValueCount++;
                            rphValue += p3Value;
                            var desc = document.getElementById("p3").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        if (p4Value != "") {
                            rphValueCount++;
                            rphValue += p4Value;
                            var desc = document.getElementById("p4").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        if (p5Value != "") {
                            rphValueCount++;
                            rphValue += p5Value;
                            var desc = document.getElementById("p5").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        if (p6Value != "") {
                            rphValueCount++;
                            rphValue += p6Value;
                            var desc = document.getElementById("p6").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        if (p7Value != "") {
                            rphValueCount++;
                            rphValue += p7Value;
                            var desc = document.getElementById("p7").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        if (p8Value != "") {
                            rphValueCount++;
                            rphValue += p8Value;
                            var desc = document.getElementById("p8").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        if (p9Value != "") {
                            rphValueCount++;
                            rphValue += p9Value;
                            var desc = document.getElementById("p9").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        if (p10Value != "") {
                            rphValueCount++;
                            rphValue += p10Value;
                            var desc = document.getElementById("p10").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDKnowledge += desc;
                        } 
                        
                        rphValue = Math.round(rphValue / rphValueCount);
                        rph[$index].value = rphValue;

                        let hpaValue = Math.round((2 * rphValue + ptsValue + pasValue) / 4);
                        hpa[$index].value = hpaValue;
                        
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
                        
                        pDesc[$index].value = sKDKnowledge;
                
                        let k1Value = Math.round(k1[$index].value);
                        let k2Value = Math.round(k2[$index].value);
                        let k3Value = Math.round(k3[$index].value);
                        let k4Value = Math.round(k4[$index].value);
                        let k5Value = Math.round(k5[$index].value);
                        let k6Value = Math.round(k6[$index].value);
                        let k7Value = Math.round(k7[$index].value);
                        let k8Value = Math.round(k8[$index].value);
                        let k9Value = Math.round(k9[$index].value);
                        let k10Value = Math.round(k10[$index].value);
                        let krpkValue = Math.round(krpk[$index].value);

                        let rpkValue = 0;
                        let rpkValueCount = 0;
                        let sKDSkills = "";
                        if (k1Value != "") {
                            rpkValueCount++;
                            rpkValue += k1Value;
                            var desc = document.getElementById("k1").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        }
                        
                        if (k2Value != "") {
                            rpkValueCount++;
                            rpkValue += k2Value;
                            var desc = document.getElementById("k2").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        if (k3Value != "") {
                            rpkValueCount++;
                            rpkValue += k3Value;
                            var desc = document.getElementById("k3").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        if (k4Value != "") {
                            rpkValueCount++;
                            rpkValue += k4Value;
                            var desc = document.getElementById("k4").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        if (k5Value != "") {
                            rpkValueCount++;
                            rpkValue += k5Value;
                            var desc = document.getElementById("k5").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        if (k6Value != "") {
                            rpkValueCount++;
                            rpkValue += k6Value;
                            var desc = document.getElementById("k6").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        if (k7Value != "") {
                            rpkValueCount++;
                            rpkValue += k7Value;
                            var desc = document.getElementById("k7").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        if (k8Value != "") {
                            rpkValueCount++;
                            rpkValue += k8Value;
                            var desc = document.getElementById("k8").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        if (k9Value != "") {
                            rpkValueCount++;
                            rpkValue += k9Value;
                            var desc = document.getElementById("k9").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        if (k10Value != "") {
                            rpkValueCount++;
                            rpkValue += k10Value;
                            var desc = document.getElementById("k10").innerText;
                            if (desc != "") {
                                desc += ". ";
                            }
                            sKDSkills += desc;
                        } 
                        
                        rpkValue = Math.round(rpkValue / rpkValueCount);
                        
                        let kPredInterval = Math.round((100 - 25) / 3);
                        let kPredC = 25 + kPredInterval;
                        let kPredB = 25 + kPredInterval * 2;
                        let kPredSB =  25 + kPredInterval * 3;
                        if (rpkValue < 25) {
                            kPred[$index].value = "D";
                        } else if (rpkValue >= 25 && rpkValue < predC) {               
                            kPred[$index].value = "C";
                        } else if (rpkValue >= predC && rpkValue < predB) {
                            kPred[$index].value = "B";
                        } else if (rpkValue >= predB && rpkValue <= kPredSB) {
                            kPred[$index].value = "SB";
                        } else if (rpkValue == 0) {
                            kPred[$index].value = "";
                        }

                        krpk[$index].value = rpkValue;
                        kDesc[$index].value = sKDSkills;
                    }

                </script>
                @endsection
									
                                    