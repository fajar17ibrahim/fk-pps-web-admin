
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    
                    <div class="container">
                        <div class="main-body">
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
                                                    <select class="single-select" id="inputNama">
                                                        <option value="United States">Sholishin</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputJenjang" class="col-sm-3 col-form-label">Jenjang</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="single-select" id="inputJenjang">
                                                        <option value="United States">Ula</option>
                                                        <option value="United States">Wustha</option>
                                                        <option value="United States">Ulya</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputMeneruskanTidak" class="col-sm-3 col-form-label">Lulus / Tidak Lulus</label>
                                                <div class="col-sm-3 text-secondary">
                                                    <div class="form-check">
                                                        <input  name="rbLulusTidak" value="Lulus" class="form-check-input" type="radio">
                                                        <label class="form-check-label" for="flexRadioDefault1" >Lulus</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6  text-secondary">
                                                    <div class="form-check">
                                                        <input name="rbLulusTidak" class="form-check-input" type="radio" value="Tidak Lulus">
                                                        <label class="form-check-label" for="flexRadioDefault1">Tidak Lulus</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3" id="thnLulus">
                                                <label for="inputThnLulus" class="col-sm-3 col-form-label">Tahun Lulus</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" value="" id="inputAlasan"/>
                                                </div>
                                            </div>

                                            <div class="row mb-3" id="melanjutkan">
                                                <label for="inputMeneruskanTidak" class="col-sm-3 col-form-label">Melanjutkan / Tidak</label>
                                                <div class="col-sm-3 text-secondary">
                                                    <div class="form-check">
                                                        <input name="rbMelanjutkanTidak" value="Melanjutkan" class="form-check-input" type="radio">
                                                        <label class="form-check-label" for="flexRadioDefault1">Melanjutkan</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6  text-secondary">
                                                    <div class="form-check">
                                                        <input name="rbMelanjutkanTidak" value="Tidak" class="form-check-input" type="radio" >
                                                        <label class="form-check-label" for="flexRadioDefault1">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3" id="nextJenjang">
                                                <label for="inputJenjangTujuan" class="col-sm-3 col-form-label">Ke Jenjang</label>
                                                <div class="col-sm-3 text-secondary">
                                                    <select class="single-select" id="inputJenjangTujuan">
                                                        <option value="United States">SMP</option>
                                                        <option value="United States">MTS</option>
                                                        <option value="United States">Wustha</option>
                                                        <option value="United States">SMA</option>
                                                        <option value="United States">SMK</option>
                                                        <option value="United States">MA</option>
                                                        <option value="United States">Ulya</option>
                                                        <option value="United States">Perguruan Tinggi</option>
                                                    </select>
                                                </div>
                                                <label for="inputSekolahAsal" class="col-sm-2 col-form-label">Status Sekolah</label>
                                                <div class="col-sm-4 text-secondary">
                                                    <select class="single-select" id="inputSekolahAsal">
                                                        <option value="United States">Negeri</option>
                                                        <option value="United States">Swasta</option>
                                                        <option value="United States">PKPPS</option>
                                                        <option value="United States">PDF</option>
                                                        <option value="United States">Muadalah</option>
                                                        <option value="United States">Luar Negeri</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3" id="alasan">
                                                <label for="inputAlasan" class="col-sm-3 col-form-label">Alasan</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" value="" id="inputAlasan"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="button" class="btn btn-success px-4" value="Simpan" />
                                                </div>
                                            </div>

                                        </div>
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
                            
                            var thnLulus = $("#thnLulus");
                            var lbMelanjutkan = $("#melanjutkan");
                            var lbNextJenjang = $("#nextJenjang");
                            var lbAlasan = $("#alasan");

                            $(thnLulus).hide();
                            $(lbMelanjutkan).hide();
                            $(lbNextJenjang).hide();
                            $(lbAlasan).hide();

                            $('input[name$="rbLulusTidak"]').click(function(){
                                var inputValue = $(this).attr("value");
                                if (inputValue == 'Lulus') {
                                    $(thnLulus).show();
                                    $(lbMelanjutkan).show();
                                    $(lbNextJenjang).show();
                                    $(lbAlasan).hide();
                                } else {
                                    $(thnLulus).hide();
                                    $(lbMelanjutkan).hide();
                                    $(lbNextJenjang).hide();
                                    $(lbAlasan).show();
                                }
                            });

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
                        });
                    });
                </script>
                @endsection