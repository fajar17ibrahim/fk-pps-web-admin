
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    
                    <div class="container">
                        <div class="main-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="post" action="{{ URL::to('/') }}/mutation/{{ $mutation['id'] }}" class="row g-3 needs-validation" novalidate>
                                            @method('PUT')    
                                            @csrf
                                                <div class="card-title d-flex align-items-center">
                                                    <div><i class="lni lni-graduation me-1 font-22 text-success"></i></div>
                                                    <h5 class="mb-0 text-success">Form Mutasi Santri</h5>
                                                </div>
                                                <hr>
                                                <div class="row mb-3">
                                                    <label for="soSantri" class="col-sm-3 col-form-label">Nama Santri</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <select name="soSantri" class="single-select" id="soSantri">
                                                            <option value="{{ $mutation['nisn'] }}">{{ $mutation['santri_nama'] }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="rbMelanjutkanTidak" class="col-sm-3 col-form-label">Meneruskan / Tidak</label>
                                                    <div class="col-sm-3 text-secondary">
                                                        <div class="form-check">
                                                            <input id="rbMelanjutkan" name="rbMelanjutkanTidak" value="Melanjutkan" class="form-check-input" type="radio" {{ $mutation['melanjutkan'] }}>
                                                            <label class="form-check-label" for="flexRadioDefault1">Meneruskan</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6  text-secondary">
                                                        <div class="form-check">
                                                            <input id="rbMelanjutkanTidak" name="rbMelanjutkanTidak" value="Tidak" class="form-check-input" type="radio" {{ $mutation['melanjutkan_tidak'] }}>
                                                            <label class="form-check-label" for="flexRadioDefault1">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3" id="sekolahTujuan">
                                                    <label for="soSchoolDest" class="col-sm-3 col-form-label">Sekolah Tujuan</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <select name="soSchoolDest" class="single-select" id="soSchoolDest">
                                                            <option value="{{ $mutation['pps_npsn'] }}">{{ $mutation['pps_nama'] }}</option>
                                                            @foreach ($schools as $school)
                                                            <option value="{{ $school->school_id }}">{{ $school->school_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3" id="alasan">
                                                    <label for="inReason" class="col-sm-3 col-form-label">Alasan</label>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input name="inReason" type="text" class="form-control" value="{{ $mutation['alasan'] }}" id="inReason"/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="submit" class="btn btn-success px-4" value="Simpan" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection

                @section('custom_js')
                <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
                <script>
                    $(document).ready(function() {
                        $(document).ready(function(){
                            
                            var lbsekolahTujuan = $("#sekolahTujuan");
                            var lbAlasan = $("#alasan");

                            $(lbsekolahTujuan).hide();
                            $(lbAlasan).hide();

                            $('input[name$="rbMelanjutkanTidak"]').click(function(){
                                var inputValue = $(this).attr("value");
                                if (inputValue == 'Melanjutkan') {
                                    $(lbsekolahTujuan).show();
                                    $(lbAlasan).hide();
                                } else {
                                    $(lbsekolahTujuan).hide();
                                    $(lbAlasan).show();
                                }
                            });

                            var melanjutkan = document.getElementById("rbMelanjutkan");
                            var tidakMelanjutkan = document.getElementById("rbMelanjutkanTidak");
                            if (melanjutkan.checked == true) {
                                $(lbsekolahTujuan).show();
                                $(lbAlasan).hide();
                            } 
                            if (tidakMelanjutkan.checked == true) {
                                $(lbsekolahTujuan).hide();
                                $(lbAlasan).show();
                            }
                        });
                    });
                </script>
                @endsection