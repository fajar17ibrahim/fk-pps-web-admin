
				@extends('admin.layouts.dashboard')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Ula</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <a href="#" class="col-sm-6">
                                        <div class="card radius-10 bg-success">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-success mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <p class="mb-0 text-white">Download Silabus</p>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                                <a href="#" class="col-sm-6">
                                    <div class="card radius-10 bg-warning">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <div class="widgets-icons rounded-circle mx-auto bg-white text-warning mb-3"><i class='bx bx-download'></i>
                                                </div>
                                                <p class="mb-0 text-white">Download RPP</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Wustha</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <a href="#" class="col-sm-6">
                                        <div class="card radius-10 bg-success">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-success mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <p class="mb-0 text-white">Download Silabus</p>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                                <a href="#" class="col-sm-6">
                                    <div class="card radius-10 bg-warning">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <div class="widgets-icons rounded-circle mx-auto bg-white text-warning mb-3"><i class='bx bx-download'></i>
                                                </div>
                                                <p class="mb-0 text-white">Download RPP</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Ulya</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <a href="#" class="col-sm-6">
                                        <div class="card radius-10 bg-success">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-success mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <p class="mb-0 text-white">Download Silabus</p>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                                <a href="#" class="col-sm-6">
                                    <div class="card radius-10 bg-warning">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <div class="widgets-icons rounded-circle mx-auto bg-white text-warning mb-3"><i class='bx bx-download'></i>
                                                </div>
                                                <p class="mb-0 text-white">Download RPP</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Ula</h5>
                            </div>
                            <hr>
                            <label for="inputGroupFileSIlabus" class="form-label">Silabus</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-success" type="button" id="inputGroupFileSIlabus">Upload</button>
                            </div>
                            <br>
                            <label for="inputGroupFileRPP" class="form-label">RPP</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFileRPP" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-success" type="button" id="inputGroupFileAddon04">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Wustha</h5>
                            </div>
                            <hr>
                            <label for="inputGroupFileSIlabus" class="form-label">Silabus</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-success" type="button" id="inputGroupFileSIlabus">Upload</button>
                            </div>
                            <br>
                            <label for="inputGroupFileRPP" class="form-label">RPP</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFileRPP" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-success" type="button" id="inputGroupFileAddon04">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Ulya</h5>
                            </div>
                            <hr>
                            <label for="inputGroupFileSIlabus" class="form-label">Silabus</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-success" type="button" id="inputGroupFileSIlabus">Upload</button>
                            </div>
                            <br>
                            <label for="inputGroupFileRPP" class="form-label">RPP</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFileRPP" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-success" type="button" id="inputGroupFileAddon04">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection