
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">

                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <h6 class="mb-0 text-uppercase">Daftar Admin</h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @include('admin/page/masterrelation/admin/admin-edit')
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
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NPSN</th>
                                                <th>Nama PPS</th>
                                                <th>Jenjang</th>
                                                <th>Nama Admin</th>
                                                <th>Aksi</th>
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
                    var school = 0;
                    var table;
                    $(function() {
                        // Menampilkan data Lembaga
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "{{ URL::to('/') }}/master-relation-admin/data",
                                "type": "GET"
                            }
                        });
                    });

                    // Form Edit Admin
                    function editForm($id) {
                        $.ajax({
                            url: "{{ URL::to('/') }}/master-relation-admin/" + $id + "/edit",
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                url = "{{ URL::to('/') }}/master-relation-admin/" + $id;
                                $('#editAdminModal').modal('show');
                                $('.modal-title').text('Form Edit Admin');
                                $('#formEdit').attr('action', url);
                                $('#inEmailOldEdit').val(data.email).attr('readonly','true');
                                $('#inEmailEdit').val(data.email);
                                $('#inNameEdit').val(data.name).attr('readonly','true');
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }

                    // Email ketika ada event change
                    $("#inEmailEdit").change(function()
                    {				
                        email = $(this).val();
                        $.ajax({
                            url: "{{ URL::to('/') }}/master-relation-admin/ustadz/search/" + email,
                            dataType: "JSON",
                            success: function(response){
                                $('#editAdminModal').modal('show');
                                $('.modal-title').text('Form Edit Admin');
                                $('#inNameEdit').val(response.name).attr('readonly','true');
                            } ,
                            error: function() {
                                $('#inEmailEdit').val('');
                                $('#inNameEdit').val('').attr('readonly','true');
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    })

                </script>
                @endsection