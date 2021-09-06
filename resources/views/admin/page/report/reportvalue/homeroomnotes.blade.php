
									
									
									
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
                        <h6 class="mb-0 text-uppercase">Input Catatan Wali Kelas Kelas 7 A</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-homeroomnotes" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                            <th rowspan="2">No</th>
                                                <th rowspan="2">NIS / NISN</th>
                                                <th rowspan="2">Nama Santri</th>
                                                <th rowspan="2">L/P</th>
                                                <th colspan="2" class="text-center">Berdasarkan Ranking</th>
                                                <th class="text-center">Berdasarkan Pilihan</th>
                                            </tr>
                                            <tr>
                                                <th>Ranking</th>
                                                <th>Catatan</th>
                                                <th>Catatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>136</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>
                                                    <select class="single-select">
                                                        <option value="United States">1</option>
                                                        <option value="United States">2</option>
                                                        <option value="United States">3</option>
                                                        <option value="United States">4</option>
                                                        <option value="United States">5</option>
                                                        <option value="United States">6</option>
                                                    </select>
                                                </td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3">Prestasinya sangat baik, perlu dipertahankan</textarea></td>
                                                <td><select class="single-select">
                                                        <option value="United States">Selalu berusaha untuk mematuhi tata tertib sekolah dan patuh terhadap Guru.</option>
                                                        <option value="United States">Selalu berusaha untuk mandiri dan tepat waktu dalam mengerjakan tugas.</option>
                                                        <option value="United States">Mempunyai kemampuan dan motivasi yang tinggi untuk menggunakan waktu secara efisien.</option>
                                                        <option value="United States">Diharapkan merubah penampilannya menjadi lebih rapi. Seperti tentang potong rambut dan cara berpakaian.</option>
                                                        <option value="United States">Masih perlu memperbanyak teman bergaul dan teman diskusi, kurangi aktifitas menyendiri.</option>
                                                        <option value="United States">Diharapkan dapat meningkatkan komitmennya untuk lebih serius saat mengerjakan tugas dan tidak mudah menyerah.</option>
                                                    </select>
                                                </td>
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