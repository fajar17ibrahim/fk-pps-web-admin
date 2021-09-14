
									
									
									
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
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="button" class="btn btn-success px-4" value="Tampilkan Data" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <h6 class="mb-0 text-uppercase">Input Nilai Prestasi Kelas 7 A</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-achievement" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                            <th rowspan="2">No</th>
                                                <th rowspan="2">NSM / NPSN</th>
                                                <th rowspan="2">Nama Santri</th>
                                                <th rowspan="2">L/P</th>
                                                <th colspan="2" class="text-center">Prenstasi 1</th>
                                                <th colspan="2" class="text-center">Prenstasi 2</th>
                                                <th colspan="2" class="text-center">Prenstasi 3</th>
                                            </tr>
                                            <tr>
                                                <th>Jenis Prestasi</th>
                                                <th>Keterangan</th>
                                                <th>Jenis Prestasi</th>
                                                <th>Keterangan</th>
                                                <th>Jenis Prestasi</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>510031750032 / 69985167</td>
                                                <td>EKO RAPORT</td>
                                                <td>L</td>
                                                <td>
                                                    <select class="single-select">
                                                        <option value="United States">Kesenian</option>
                                                        <option value="United States">Keagamaan</option>
                                                    </select>
                                                </td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td>
                                                    <select class="single-select">
                                                        <option value="United States">Kesenian</option>
                                                        <option value="United States">Keagamaan</option>
                                                    </select>
                                                </td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
                                                <td>
                                                    <select class="single-select">
                                                        <option value="United States">Kesenian</option>
                                                        <option value="United States">Keagamaan</option>
                                                    </select>
                                                </td>
                                                <td><textarea class="form-control" id="inputDescription" placeholder="" rows="3"></textarea></td>
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