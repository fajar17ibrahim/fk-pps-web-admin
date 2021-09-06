
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
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
                                    <h6 class="mb-0">UTS / UAS</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                        <select class="single-select">
                                            <option value="United States">UTS (Ujian Tengah Semester)</option>
                                            <option value="United Kingdom">UAS (Ujian Akhir Semester)</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Jenjang</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select">
                                        <option value="United States">Ula</option>
                                        <option value="United States">Wustha</option>
                                        <option value="United States">Ulya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Pondok Pesantren</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select">
                                        <option value="United States">MA MINHAAJUSHSHOOBIRIIN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Rombel</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select">
                                        <option value="United States">7 A</option>
                                        <option value="United States">7 B</option>
                                        <option value="United States">7 C</option>
                                        <option value="United States">7 D</option>
                                        <option value="United States">7 E</option>
                                        <option value="United States">8 A</option>
                                        <option value="United States">8 B</option>
                                        <option value="United States">8 C</option>
                                        <option value="United States">8 D</option>
                                        <option value="United States">8 E</option>
                                        <option value="United States">9 A</option>
                                        <option value="United States">9 B</option>
                                        <option value="United States">9 C</option>
                                        <option value="United States">9 D</option>
                                        <option value="United States">9 E</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mata Pelajaran</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select">
                                        <option value="United States">Al-Qur'an</option>
                                        <option value="United States">Hadist</option>
                                        <option value="United States">Akidah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="button" class="btn btn-success px-4" value="Tampilkan Data" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <h6 class="mb-0 text-uppercase">Input Nilai Rapor UTS Kelas 7 A Mata Pelajaran Al-Qur'an</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                            @include('admin/page/report/reportvalue/report-value')

                                <ul class="nav nav-pills nav-pills-success mb-3 " role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#success-pills-home" role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='lni lni-book font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Nilai Rapor</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#success-pills-attitude" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='lni lni-diamond-alt font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Nilai Sikap</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#success-pills-attendance" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='lni lni-checkmark-circle font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Kehadiran</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#success-pills-extrakurikuler" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='lni lni-basketball font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Extrakurikuler</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#success-pills-achievement" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='lni lni-cup font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Prestasi</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#success-pills-homeroomnotes" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='lni lni-notepad font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">Catatan Wali Kelas </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                   
                                    @include('admin/page/report/reportvalue/attitude')
                                    @include('admin/page/report/reportvalue/attendance')
                                    @include('admin/page/report/reportvalue/extrakurikuler')
                                    @include('admin/page/report/reportvalue/achievement')
                                    @include('admin/page/report/reportvalue/homeroomnotes')
                                </div>
                                <div class="d-flex align-items-center">
									
                                    <input type="button" class="btn btn-success px-4  ms-auto" value="Simpan" />
								</div>
                                
                            </div>
                            
                        </div>
                    </div>

                </div>
                @endsection