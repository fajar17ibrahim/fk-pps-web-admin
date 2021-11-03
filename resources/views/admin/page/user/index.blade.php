
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <h6 class="mb-0 text-uppercase">Daftar Akun User</h6>
                            @if(Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['role_id'] == 2)
                            <button type="button" class="btn btn-warning px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class='bx bx-plus-circle mr-1'></i>Tambah Data User</button>
                            @include('admin/page/user/user-add')
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-body">
                            @include('admin/page/user/user-edit')
                            @if(Session::has('message_success'))
                                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-white">Berhasil Update Data</h6>
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
                                                <h6 class="mb-0 text-white">Gagal Update Data!</h6>
                                                <div class="text-white">{{ Session::get('message_error') }}</div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>ID User</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                @if(Session::get('user')[0]['role_id'] == 1 || Session::get('user')[0]['role_id'] == 2)
                                                <th width="10%">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection

                @section('custom_js')
                <script>
                    var table;
                    var status = 0;
                    $(function() {
                        // Menampilkan data User
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "user/data",
                                "type": "GET"
                            }
                        });
                    
                    });

                    // Email ketika ada event change
                    $("#inEmail").change(function()
                    {				
                        email = $(this).val();
                        $.ajax({
                            url: "user/search/" + email,
                            dataType: "JSON",
                            success: function(response){
                                $('#addUserModal').modal('show');
                                $('.modal-title').text('Form Tambah User');
                                $('#inName').val(response[0].ustadz_name).attr('readonly','true');
                            } ,
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    })

                    // Form Edit User
                    function editForm($id) {
                        url = "user/" + $id;
                        $.ajax({
                            url: "user/" + $id + "/edit",
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                $('#editUserModal').modal('show');
                                $('.modal-title').text('Form Edit User');
                                $('#formEdit').attr('action', url);
                                $('#inEmailEdit').val(data.email).attr('readonly','true');
                                $('#inNameEdit').val(data.name).attr('readonly','true');
                                $('#soRoleEdit').val(data.level);
                                $('#soStatusEdit').val(data.status);
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }
                    
                </script>
                @endsection