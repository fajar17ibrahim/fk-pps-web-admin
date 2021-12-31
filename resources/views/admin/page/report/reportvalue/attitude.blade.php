
									
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
                        <h6 class="mb-0 text-uppercase">Input Nilai Sikap</h6>
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
                                <div class="table-responsive">
                                    <!-- <table id="dataTable" class="table table-striped table-borderless" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2" >No</th>
                                                <th rowspan="2" >NSM / NPSN</th>
                                                <th rowspan="2" >Nama Santri</th>
                                                <th rowspan="2" >L/P</th>
                                                <th rowspan="2" >Predikat</th>
                                                <th colspan="2" >Sikap Spiritual Menonjol</th>
                                                <th rowspan="2" >Sikap Spiritual yang tidak Menonjol</th>
                                                <th rowspan="2" >Predikat</th>
                                                <th colspan="3" >Sikap Sosial Selalu Dilakukan</th>
                                                <th rowspan="2" >Sedang Berkembang</th>
                                                <th rowspan="2" >Tambah Catatan Manual</th>
                                                <th rowspan="2" >Sikap Sosial yang tidak Menonjol</th>
                                            </tr>
                                            <tr>
                                                <th >Selalu Dilakukan</th>
                                                <th >Mulai Berkembang</th>
                                                <th >Sangat Baik</th>
                                                <th >Baik</th>
                                                <th >Kurang</th>
                                                <th >Deskripsi</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table> -->
                                </div>
                                <br>
                                <form method="post" action="{{ route('report-attitude.store') }}" class="row mb-3 g-3 needs-validation mb-3" novalidate>
                                    @csrf
                                    <div class="row ">
                                        <div class="col-lg-12">
                                            <div class="row mb-3 position-relative">
                                                <label for="soSantriNISN" class="col-sm-3 col-form-label">Nama Santri</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="form-select form-control" name="soSantriNISN" id="soSantriNISN" >
                                                        <!-- @foreach ($santris as $santri)
                                                            <option value="{{ $santri->santri_nisn }}" class="form-control">{{ $santri->santri_nisn . " - " .$santri->santri_name }}</option>
                                                        @endforeach -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-title d-flex align-items-center ">
                                                <h5 class="mb-0 text-success">Penilaian Sikap Spiritual</h5>
                                            </div>
                                            <hr>
                                            <div class="row mb-3 position-relative">
                                                <label for="soPred" class="col-sm-3 col-form-label">Predikat</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="form-select form-control" name="soPred" id="soPred" >
                                                        <option value="SB" class="form-control">SB</option>
                                                        <option value="B" class="form-control">B</option>
                                                        <option value="C" class="form-control">C</option>
                                                        <option value="D" class="form-control">D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h6 class="text-bold"><b>A. Sikap yang Menonjol</b></h6>
                                            <br>
                                            <div class="row mb-3 position-relative">
                                                <label for="inSantriNISN" class="col-sm-3 col-form-label">Selalu Dilakukan</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Berdoa sebelum dan sesudah melakukan kegiatan" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Berdoa sebelum dan sesudah melakukan kegiatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Menjalankan ibadah sesuai dengan agamanya" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Menjalankan ibadah sesuai dengan agamanya</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Memberi salam pada saat awal dan akhir kegiatan" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Memberi salam pada saat awal dan akhir kegiatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Mensyukuri kemampuan manusia dalam mengendalikan diri" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Mensyukuri kemampuan manusia dalam mengendalikan diri</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Bersyukur ketika berhasil mengerjakan sesuatu" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur ketika berhasil mengerjakan sesuatu</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Berserah diri (tawakal) kepada Tuhan setelah berikhtiar atau melakukan usaha" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Berserah diri (tawakal) kepada Tuhan setelah berikhtiar atau melakukan usaha</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Memelihara hubungan baik dengan sesama umat" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Memelihara hubungan baik dengan sesama umat</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Bersyukur sebagai bangsa Indonesia" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur sebagai bangsa Indonesia</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeAlwaysDo[]" type="checkbox" value="Menghormati orang lain yang menjalankan ibadah sesuai dengan agamanya" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Menghormati orang lain yang menjalankan ibadah sesuai dengan agamanya</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 position-relative">
                                                <label class="col-sm-3 col-form-label">Mulai Bekembang</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Berdoa sebelum dan sesudah melakukan kegiatan" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Berdoa sebelum dan sesudah melakukan kegiatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Menjalankan ibadah sesuai dengan agamanya" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Menjalankan ibadah sesuai dengan agamanya</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Memberi salam pada saat awal dan akhir kegiatan" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Memberi salam pada saat awal dan akhir kegiatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Mensyukuri kemampuan manusia dalam mengendalikan diri" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Mensyukuri kemampuan manusia dalam mengendalikan diri</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Bersyukur ketika berhasil mengerjakan sesuatu" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur ketika berhasil mengerjakan sesuatu</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Berserah diri (tawakal) kepada Tuhan setelah berikhtiar atau melakukan usaha" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Berserah diri (tawakal) kepada Tuhan setelah berikhtiar atau melakukan usaha</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Memelihara hubungan baik dengan sesama umat" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Memelihara hubungan baik dengan sesama umat</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Bersyukur sebagai bangsa Indonesia" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur sebagai bangsa Indonesia</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolve[]" type="checkbox" value="Menghormati orang lain yang menjalankan ibadah sesuai dengan agamanya" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Menghormati orang lain yang menjalankan ibadah sesuai dengan agamanya</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="text-bold"><b>B. Sikap yang tidak Menonjol</b></h6>
                                            <br>
                                            <div class="row mb-3 position-relative">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Berdoa sebelum dan sesudah melakukan kegiatan" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Berdoa sebelum dan sesudah melakukan kegiatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Menjalankan ibadah sesuai dengan agamanya" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Menjalankan ibadah sesuai dengan agamanya</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Memberi salam pada saat awal dan akhir kegiatan" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Memberi salam pada saat awal dan akhir kegiatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Mensyukuri kemampuan manusia dalam mengendalikan diri" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Mensyukuri kemampuan manusia dalam mengendalikan diri</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Bersyukur ketika berhasil mengerjakan sesuatu" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur ketika berhasil mengerjakan sesuatu</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Berserah diri (tawakal) kepada Tuhan setelah berikhtiar atau melakukan usaha" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Berserah diri (tawakal) kepada Tuhan setelah berikhtiar atau melakukan usaha</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Memelihara hubungan baik dengan sesama umat" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Memelihara hubungan baik dengan sesama umat</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Bersyukur sebagai bangsa Indonesia" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Bersyukur sebagai bangsa Indonesia</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotStandOut[]" type="checkbox" value="Menghormati orang lain yang menjalankan ibadah sesuai dengan agamanya" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Menghormati orang lain yang menjalankan ibadah sesuai dengan agamanya</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-title d-flex align-items-center ">
                                                <h5 class="mb-0 text-success">Penilaian Sikap Sosial</h5>
                                            </div>
                                            <hr>
                                            <div class="row mb-3 position-relative">
                                                <label for="inSantriNISM" class="col-sm-3 col-form-label">Predikat</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="form-select form-control" name="soPredSocialAttitude" id="soPredSocialAttitude" >
                                                        <option value="SB" class="form-control">SB</option>
                                                        <option value="B" class="form-control">B</option>
                                                        <option value="C" class="form-control">C</option>
                                                        <option value="D" class="form-control">D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h6 class="text-bold"><b>A. Sikap yang Selalu dilakukan</b></h6>
                                            <br>
                                            <div class="row mb-3 position-relative">
                                                <label class="col-sm-3 col-form-label">Sangat Baik</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeVeryGood[]" type="checkbox" value="Jujur" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Jujur</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeVeryGood[]" name="cbAttitudeVeryGood[]" type="checkbox" value="Disiplin" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Disiplin</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeVeryGood[]" type="checkbox" value="Tanggung jawab" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Tanggung jawab</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeVeryGood[]" type="checkbox" value="Santun" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Santun</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeVeryGood[]" type="checkbox" value="Percaya diri" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Percaya diri</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeVeryGood[]" type="checkbox" value="Peduli" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Peduli</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeVeryGood[]" type="checkbox" value="Toleransi" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Toleransi</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeVeryGood[]" type="checkbox" value="Gotong Royong" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Gotong Royong</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 position-relative">
                                                <label class="col-sm-3 col-form-label">Baik</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Jujur" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Jujur</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" name="cbAttitudeVeryGood[]" type="checkbox" value="Disiplin" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Disiplin</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Tanggung jawab" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Tanggung jawab</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Santun" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Santun</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Percaya diri" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Percaya diri</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Peduli" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Peduli</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Toleransi" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Toleransi</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Gotong Royong" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Gotong Royong</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 position-relative">
                                                <label class="col-sm-3 col-form-label">Kurang</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Jujur" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Jujur</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" name="cbAttitudeVeryGood[]" type="checkbox" value="Disiplin" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Disiplin</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Tanggung jawab" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Tanggung jawab</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Santun" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Santun</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Percaya diri" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Percaya diri</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Peduli" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Peduli</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Toleransi" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Toleransi</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeNotGood[]" type="checkbox" value="Gotong Royong" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Gotong Royong</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="text-bold"><b>B. Sikap yang mulai Meningkat</b></h6>
                                            <br>
                                            <div class="row mb-3 position-relative">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolveSocial[]" type="checkbox" value="Jujur" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Jujur</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolveSocial[]" name="cbAttitudeVeryGood[]" type="checkbox" value="Disiplin" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Disiplin</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolveSocial[]" type="checkbox" value="Tanggung jawab" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Tanggung jawab</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolveSocial[]" type="checkbox" value="Santun" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Santun</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolveSocial[]" type="checkbox" value="Percaya diri" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Percaya diri</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolveSocial[]" type="checkbox" value="Peduli" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Peduli</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolveSocial[]" type="checkbox" value="Toleransi" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Toleransi</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="cbAttitudeEvolveSocial[]" type="checkbox" value="Gotong Royong" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Gotong Royong</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-title d-flex align-items-center ">
                                                <h5 class="mb-0 text-success">Catatan Manual (Jika dibutuhkan)</h5>
                                            </div>
                                            <hr>
                                            <div class="row mb-3 position-relative">
                                                <label class="col-sm-3 col-form-label">Catatan</label>
                                                <div class="col-sm-9 text-secondary">
                                                <textarea name="taNotes" style="height:100px" class="form-control" id="taNotes" placeholder="" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3 position-relative">
                                                <label for="inSantriNISM" class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-success px-4 ms-auto" value="Simpan" />
                                                </div>
                                            </div>
                                        </div>  
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
                    // $(function() {
                    //     // Menampilkan data Report Value
                    //     table = $('#dataTable').DataTable({
                    //         ajax: {
                    //             "url": "{{ URL::to('/') }}/report-attitude/data/" + level + "/" + school + "/" + kelas + "/" + mapel,
                    //             "type": "GET"
                    //         }
                    //     });
                    // });

                    $(function() {
                        // Menampilkan data Report Value
                        $.ajax({
                            url: "{{ URL::to('/') }}/report-attitude/data/" + 0 + "/" + 0 + "/" + 0,
                            success: function(response){
                                $('#soSantriNISN').empty();
                                $.each(response, function(key, value) {
                                    $('#soSantriNISN').append(new Option(value.santri_nisn + " - " + value.santri_name, value.santri_nisn));
                                    // alert(key);
                                });
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
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
                            url: "{{ URL::to('/') }}/report-attitude/data/" + level + "/" + school + "/" + kelas,
                            success: function(response){
                                $('#soSantriNISN').empty();
                                $.each(response, function(key, value) {
                                    $('#soSantriNISN').append(new Option(value.santri_nisn + " - " + value.santri_name, value.santri_nisn));
                                    // alert(key);
                                });
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    };

                </script>
                @endsection
                                    