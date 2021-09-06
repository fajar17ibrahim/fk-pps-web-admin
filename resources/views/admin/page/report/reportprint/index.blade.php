
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
                        <h6 class="mb-0 text-uppercase">Daftar Nilai Rapor UTS Kelas 7 A</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS / NISN</th>
                                                <th>Nama Santri</th>
                                                <th>L/P</th>
                                                <th>Tanggal Download</th>
                                                <th>Link Download</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>136</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>2021-01-01 12:12:12</td>
                                                <td><a href="#">rapor.pdf</a></td>
                                                <td><input type="button" class="btn btn-danger" value="Blok Rapor" /></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>136</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>2021-01-01 12:12:12</td>
                                                <td><a href="#">rapor.pdf</a></td>
                                                <td><input type="button" class="btn btn-danger" value="Blok Rapor" /></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>136</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>2021-01-01 12:12:12</td>
                                                <td><a href="#">rapor.pdf</a></td>
                                                <td><input type="button" class="btn btn-danger" value="Blok Rapor" /></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>136</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>2021-01-01 12:12:12</td>
                                                <td><a href="#">rapor.pdf</a></td>
                                                <td><input type="button" class="btn btn-secondary" value="Unblok Rapor" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection