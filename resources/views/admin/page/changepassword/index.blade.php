
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    
                    <div class="container">
                        <div class="main-body">
                            <form method="post" action="{{ route('chengepassword-request') }}" class="row g-3 needs-validation" novalidate>
                            @csrf
                                <div class="row">
                                    <div class="col-lg-12">
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

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center">
                                                    <div><i class="bx bx-key me-1 font-22 text-success"></i></div>
                                                    <h5 class="mb-0 text-success">Ganti Password</h5>
                                                </div>
                                                <hr>
                                                <div class="row mb-3">
                                                    <label for="inPasswordOld" class="col-sm-3 col-form-label">Password Lama</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group" id="show_hide_password_old">
                                                            <input type="password" name="inPasswordOld" class="form-control border-end-0" id="inPasswordOld" value="" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                            <div class="invalid-tooltip">Password Lama boleh kosong</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inPasswordNew" class="col-sm-3 col-form-label">Password Baru</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group" id="show_hide_password_new">
                                                            <input type="password" name="inPasswordNew" class="form-control border-end-0" id="inPasswordNew" value="" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                            <div class="invalid-tooltip">Password Baru boleh kosong</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inPasswordConfirm" class="col-sm-3 col-form-label">Password Konfirmasi</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group" id="show_hide_password_confirm">
                                                            <input type="password" name="inPasswordConfirm" class="form-control border-end-0" id="inPasswordConfirm" value="" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                            <div class="invalid-tooltip">Password Konfirmasi boleh kosong</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="submit" class="btn btn-success px-4" value="Simpan" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endsection

                @section('custom_js')
				<script>
					// Password show & hide
                    $(document).ready(function () {
                        $("#show_hide_password_old a").on('click', function (event) {
                            event.preventDefault();
                            if ($('#show_hide_password_old input').attr("type") == "text") {
                                $('#show_hide_password_old input').attr('type', 'password');
                                $('#show_hide_password_old i').addClass("bx-hide");
                                $('#show_hide_password_old i').removeClass("bx-show");
                            } else if ($('#show_hide_password_old input').attr("type") == "password") {
                                $('#show_hide_password_old input').attr('type', 'text');
                                $('#show_hide_password_old i').removeClass("bx-hide");
                                $('#show_hide_password_old i').addClass("bx-show");
                            }
                        });

                        $("#show_hide_password_new a").on('click', function (event) {
                            event.preventDefault();
                            if ($('#show_hide_password_new input').attr("type") == "text") {
                                $('#show_hide_password_new input').attr('type', 'password');
                                $('#show_hide_password_new i').addClass("bx-hide");
                                $('#show_hide_password_new i').removeClass("bx-show");
                            } else if ($('#show_hide_password_new input').attr("type") == "password") {
                                $('#show_hide_password_new input').attr('type', 'text');
                                $('#show_hide_password_new i').removeClass("bx-hide");
                                $('#show_hide_password_new i').addClass("bx-show");
                            }
                        });

                        $("#show_hide_password_confirm a").on('click', function (event) {
                            event.preventDefault();
                            if ($('#show_hide_password_confirm input').attr("type") == "text") {
                                $('#show_hide_password_confirm input').attr('type', 'password');
                                $('#show_hide_password_confirm i').addClass("bx-hide");
                                $('#show_hide_password_confirm i').removeClass("bx-show");
                            } else if ($('#show_hide_password_confirm input').attr("type") == "password") {
                                $('#show_hide_password_confirm input').attr('type', 'text');
                                $('#show_hide_password_confirm i').removeClass("bx-hide");
                                $('#show_hide_password_confirm i').addClass("bx-show");
                            }
                        });
                    });

				</script>
				@endsection
