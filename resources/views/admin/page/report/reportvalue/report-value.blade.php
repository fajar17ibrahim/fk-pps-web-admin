
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
                                    <h6 class="mb-0">PKPPS</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select">
                                        <option value="United States">MINHAAJUSHSHOOBIRIIN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Kelas</h6>
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
										<option value="United States">10 A</option>
										<option value="United States">10 B</option>
										<option value="United States">10 C</option>
										<option value="United States">10 D</option>
										<option value="United States">10 E</option>
										<option value="United States">11 A</option>
										<option value="United States">11 B</option>
										<option value="United States">11 C</option>
										<option value="United States">11 D</option>
										<option value="United States">11 E</option>
										<option value="United States">12 A</option>
										<option value="United States">12 B</option>
										<option value="United States">12 C</option>
										<option value="United States">12 D</option>
										<option value="United States">12 E</option>
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
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <h6 class="mb-0 text-uppercase">Input Nilai Rapor UTS Kelas 7 A Mata Pelajaran Al-Qur'an</h6>
                            <a class="ms-auto" href="/report-value-settings"> 
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
                                <div class="table-responsive">
                                    <table id="report-value" class="table table-striped table-borderless">
                                        <thead class="align-middle">
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">NSM / NPSN</th>
                                                <th rowspan="2">Nama Santri</th>
                                                <th rowspan="2">L/P</th>
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
                                                <th rowspan="2" >Deskripsi</th>
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
                                            <tr>
                                                <td>1</td>
                                                <td>510031750032 / 69985167</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" style="width:300px" placeholder="" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>510031750032 / 69985167</td>
                                                <td>DWI KURTILAS</td>
                                                <td>P</td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>510031750032 / 69985167</td>
                                                <td>DINILAI</td>
                                                <td>L</td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>510031750032 / 69985167</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>510031750032 / 69985167</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>510031750032 / 69985167</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>1510031750032 / 6998516736</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><input type="text" class="form-control" value="" /></td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th >No</th>
                                                <th rowspan="2">NSM / NPSN</th>
                                                <th>Nama Santri</th>
                                                <th >L/P</th>
                                                <th >KKM</th>
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
                                                <th>RPH</th>
                                                <th>PTS</th>
                                                <th>PAS</th>
                                                <th>HPA</th>
                                                <th>PRE</th>
                                                <th>Deskripsi</th>
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
                                                <th>HPA</th>
                                                <th>PRE</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </tfoot>
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
									
                                    