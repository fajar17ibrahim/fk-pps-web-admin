
				@extends('admin.layouts.dashboard')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    
    <div class="container">
        <div class="main-body">
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
            @if(Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['class_level'] == 'Ula')
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Ula</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Ula/Curriculum" class="col-sm-12">
                                        <div class="card radius-10 bg-success">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-success mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download Kurikulum</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inCurriculumUla" class="form-label">Upload Kurikulum</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inCurriculumUla" type="file" class="form-control" id="inCurriculumUla" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Silabus Ula</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Ula/Silabus" class="col-sm-12">
                                        <div class="card radius-10 bg-warning">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-warning mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download Silabus</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inSilabusUla" class="form-label">Upload Silabus</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inSilabusUla" type="file" class="form-control" id="inSilabusUla" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">RPP Ula</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Ula/RPP" class="col-sm-12">
                                        <div class="card radius-10 bg-info">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-info mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download RPP</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inRPPUla" class="form-label">Upload RPP</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inRPPUla" type="file" class="form-control" id="inRPPUla" aria-describedby="inRPPUla" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['class_level'] == 'Wustha')
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Wustha</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Wustha/Curriculum" class="col-sm-12">
                                        <div class="card radius-10 bg-success">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-success mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download Kurikulum</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inCurriculumWustha" class="form-label">Upload Kurikulum</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inCurriculumWustha" type="file" class="form-control" id="inCurriculumWustha" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Silabus Wustha</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Wustha/Silabus" class="col-sm-12">
                                        <div class="card radius-10 bg-warning">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-warning mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download Silabus</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inSilabusWustha" class="form-label">Upload Silabus</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inSilabusWustha" type="file" class="form-control" id="inSilabusWustha" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">RPP Wustha</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Wustha/RPP" class="col-sm-12">
                                        <div class="card radius-10 bg-info">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-info mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download RPP</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inRPPWustha" class="form-label">Upload RPP</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inRPPWustha" type="file" class="form-control" id="inRPPWustha" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['class_level'] == 'Ulya')
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Kurikulum Ulya</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Ulya/Curriculum" class="col-sm-12">
                                        <div class="card radius-10 bg-success">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-success mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download Kurikulum</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inCurriculumUlya" class="form-label">Upload Kurikulum</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inCurriculumUlya" type="file" class="form-control" id="inCurriculumUlya" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">Silabus Ulya</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Ulya/Silabus" class="col-sm-12">
                                        <div class="card radius-10 bg-warning">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-warning mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download Silabus</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inSilabusUlya" class="form-label">Upload Silabus</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inSilabusUlya" type="file" class="form-control" id="inSilabusUlya" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-success">RPP Ulya</h5>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('curriculum.store') }}"  enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <a href="{{ URL::to('/') }}/curriculum/Ulya/RPP" class="col-sm-12">
                                        <div class="card radius-10 bg-info">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="widgets-icons rounded-circle mx-auto bg-white text-info mb-3"><i class='bx bx-download'></i>
                                                    </div>
                                                    <h4 class="mb-0 text-white">Download RPP</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if(Session::get('user')[0]['role_id'] == 1)
                                <label for="inRPPUlya" class="form-label">Upload RPP</label>
                                <div class="input-group mb-3 position-relative">
                                    <input name="inRPPUlya" type="file" class="form-control" id="inRPPUlya" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
                                    <div class="invalid-tooltip">File tidak boleh kosong</div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection