
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    
                    <div class="container">
                        <div class="main-body">
                            <form method="post" action="{{ URL::to('/') }}/graduation/{{ $graduation['id'] }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            @method('PUT')
                            @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center">
                                                    <div><i class="lni lni-graduation me-1 font-22 text-success"></i></div>
                                                    <h5 class="mb-0 text-success">Form Kelulusan Santri</h5>
                                                </div>
                                                <hr>
                                                <div class="row mb-3">
                                                    <label for="inputNama" class="col-sm-3 col-form-label">Nama Santri</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <select name="soSantri" class="single-select" id="inputNama">
                                                            <option value="{{ $graduation['nisn'] }}">{{ $graduation['santri_nama'] }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inputJenjang" class="col-sm-3 col-form-label">Jenjang</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <select name="soLevel" class="single-select" id="inputJenjang">
                                                            <option value="{{ $graduation['kelas_jenjang'] }}">{{ $graduation['kelas_jenjang'] }}</option>
                                                            <option value="Ula">Ula</option>
                                                            <option value="Wustha">Wustha</option>
                                                            <option value="Ulya">Ulya</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="soKelas" class="col-sm-3 col-form-label">Kelas</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <select name="soKelas" class="single-select" id="soKelas">
                                                            <option value="{{ $graduation['kelas_kode'] }}">{{ $graduation['kelas_nama'] }}</option>
                                                            @foreach ($kelass as $kelas)
                                                                <option value="{{ $kelas['id'] }}">{{ $kelas['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inputMeneruskanTidak" class="col-sm-3 col-form-label">Lulus / Tidak Lulus</label>
                                                    <div class="col-sm-3 text-secondary">
                                                        <div class="form-check">
                                                            <input id="rbLulus" name="rbLulusTidak" value="Lulus" class="form-check-input" type="radio" {{ $graduation['lulus'] }}>
                                                            <label class="form-check-label" for="flexRadioDefault1" >Lulus</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6  text-secondary">
                                                        <div class="form-check">
                                                            <input id="rbTidak" name="rbLulusTidak" class="form-check-input" type="radio" value="Tidak Lulus" {{ $graduation['tidak'] }}>
                                                            <label class="form-check-label" for="flexRadioDefault1">Tidak Lulus</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3" id="thnLulus">
                                                    <label for="inputThnLulus" class="col-sm-3 col-form-label">Tahun Lulus</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input name="inGraduatedYear" type="text" class="form-control" value="{{ $graduation['lulus_tahun'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="taskNumber">
                                                    <label for="inTaskNumber" class="col-sm-3 col-form-label">Nomor Ujian</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input name="inTaskNumber" type="number" class="form-control" value="{{ $graduation['nomor_ujian'] }}" id="inTaskNumber"/>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="melanjutkan">
                                                    <label for="inputMeneruskanTidak" class="col-sm-3 col-form-label">Melanjutkan / Tidak</label>
                                                    <div class="col-sm-3 text-secondary">
                                                        <div class="form-check">
                                                            <input id="rbMelanjutkan" name="rbMelanjutkanTidak" value="Melanjutkan" class="form-check-input" type="radio" {{ $graduation['melanjutkan'] }}>
                                                            <label class="form-check-label" for="flexRadioDefault1">Melanjutkan</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6  text-secondary">
                                                        <div class="form-check">
                                                            <input id="rbMelanjutkanTidak" name="rbMelanjutkanTidak" value="Tidak" class="form-check-input" type="radio" {{ $graduation['melanjutkan_tidak'] }}>
                                                            <label class="form-check-label" for="flexRadioDefault1">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="nextJenjang">
                                                    <label for="inputJenjangTujuan" class="col-sm-3 col-form-label">Ke Jenjang</label>
                                                    <div class="col-sm-3 text-secondary">
                                                        <select name="soJenjangTujuan" class="single-select" id="inputJenjangTujuan">
                                                            <option value="{{ $graduation['sekolah_dest_level'] }}">{{ $graduation['sekolah_dest_level'] }}</option>    
                                                            <option value="SMP">SMP</option>
                                                            <option value="MTS">MTS</option>
                                                            <option value="Wustha">Wustha</option>
                                                            <option value="SMA">SMA</option>
                                                            <option value="SMK">SMK</option>
                                                            <option value="MA">MA</option>
                                                            <option value="Ulya">Ulya</option>
                                                            <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                                        </select>
                                                    </div>
                                                    <label for="inputSekolahAsal" class="col-sm-2 col-form-label">Status Sekolah</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <select name="soStatusSekolahTujuan" class="single-select" id="inputSekolahAsal">
                                                            <option value="{{ $graduation['sekolah_dest_status'] }}">{{ $graduation['sekolah_dest_status'] }}</option>
                                                            <option value="Negeri">Negeri</option>
                                                            <option value="Swasta">Swasta</option>
                                                            <option value="PKPPS">PKPPS</option>
                                                            <option value="PDF">PDF</option>
                                                            <option value="Muadalah">Muadalah</option>
                                                            <option value="Luar Negeri">Luar Negeri</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="alasan">
                                                    <label for="inputAlasan" class="col-sm-3 col-form-label">Alasan</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input name="inTidakMelanjutkNReason" type="text" class="form-control" value="{{ $graduation['alasan'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>

                                                <div class="mb-3" id="nus">
                                                    <div class="card-title d-flex align-items-center">
                                                        <div><i class="lni lni-book me-1 font-22 text-success"></i></div>
                                                        <h5 class="mb-0 text-success">Nilai Akhir Sekolah</h5>
                                                    </div>
                                                    <hr>

                                                    @foreach ($graduation['nilai_akhir'] as $nilai)
                                                    <div class="row mb-3">
                                                        <label for="inMapel" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                                        <div class="col-sm-4 text-secondary">
                                                        <input name="inMapelId[]" type="hidden" class="form-control" value="{{ $nilai['mapel_kode'] }}"/>
                                                            <input name="inMapel[]" type="text" class="form-control" value="{{ $nilai['mapel_nama'] }}" id="inNUS" readonly/>
                                                        </div>

                                                        <label for="inNUS" class="col-sm-3 col-form-label">Nilai Ujian Sekolah (NUS)</label>
                                                        <div class="col-sm-2 text-secondary">
                                                            <input name="inNUS[]" type="number" class="form-control" value="{{ $nilai['nus'] }}" id="inNUS"/>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="submit" class="btn btn-success px-4" value="Simpan" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endsection

                @section('custom_js')
                <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
                <script>
                    $(document).ready(function() {
                        $(document).ready(function(){
                            
                            var thnLulus = $("#thnLulus");
                            var taskNumber = $("#taskNumber");
                            var nus = $("#nus");
                            var lbMelanjutkan = $("#melanjutkan");
                            var lbNextJenjang = $("#nextJenjang");
                            var lbAlasan = $("#alasan");

                            $(lbMelanjutkan).hide();
                            $(lbNextJenjang).hide();
                            $(lbAlasan).hide();

                            $('input[name$="rbLulusTidak"]').click(function(){
                                var inputValue = $(this).attr("value");
                                if (inputValue == 'Lulus') {
                                    $(thnLulus).show();
                                    $(taskNumber).show();
                                    $(nus).show();
                                    $(lbMelanjutkan).show();
                                    $(lbNextJenjang).show();
                                    $(lbAlasan).hide();
                                } else {
                                    $(lbMelanjutkan).hide();
                                    $(lbNextJenjang).hide();
                                    $(lbAlasan).show();
                                }
                            });

                            var lulus = document.getElementById("rbLulus");
                            var tidak = document.getElementById("rbTidak");
                            if (lulus.checked == true) {
                                $(thnLulus).show();
                                $(taskNumber).show();
                                $(nus).show();
                                $(lbMelanjutkan).show();
                                $(lbNextJenjang).show();
                                $(lbAlasan).hide();
                            } 
                            if (tidak.checked == true) {
                                $(thnLulus).hide();
                                $(lbMelanjutkan).hide();
                                $(lbNextJenjang).hide();
                                $(lbAlasan).show();
                            }

                            $('input[name$="rbMelanjutkanTidak"]').click(function(){
                                var inputValue = $(this).attr("value");
                                if (inputValue == 'Melanjutkan') {
                                    $(lbNextJenjang).show();
                                    $(lbAlasan).hide();
                                } else {
                                    $(lbNextJenjang).hide();
                                    $(lbAlasan).show();
                                }
                            });

                            var melanjutkan = document.getElementById("rbMelanjutkan");
                            var tidakMelanjutkan = document.getElementById("rbMelanjutkanTidak");
                            if (melanjutkan.checked == true) {
                                $(lbNextJenjang).show();
                                $(lbAlasan).hide();
                            } 
                            if (tidakMelanjutkan.checked == true) {
                                $(lbNextJenjang).hide();
                                $(lbAlasan).show();
                            }
                        });
                    });
                </script>
                @endsection