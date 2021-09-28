
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
                                                <label for="inputMeneruskanTidak" class="col-sm-3 col-form-label">Lulus / Tidak</label>
                                                <div class="col-sm-3 text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">Lulus</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6  text-secondary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputSekolahAsal" class="col-sm-3 col-form-label">Jenjang</label>
                                                <div class="col-sm-9 text-secondary">
                                                    <select class="single-select" id="inputSekolahAsal">
                                                        <option value="United States">Ula</option>
                                                        <option value="United States">Wustha</option>
                                                        <option value="United States">Ulya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputAlasan" class="col-sm-3 col-form-label">Tahun Lulus</label>
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