
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">

                    <div class="col">
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <h6 class="mb-0 text-uppercase">Daftar Kepala Sekolah</h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @include('admin/page/masterrelation/headmaster/headmaster-edit')
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
                                                <th>Kepala Sekolah</th>
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
                                "url": "{{ URL::to('/') }}/master-relation-headmaster/data",
                                "type": "GET"
                            }
                        });
                    });

                    // Form Edit Kepala Sekolah
                    function editForm($id) {
                        $.ajax({
                            url: "{{ URL::to('/') }}/master-relation-headmaster/" + $id + "/edit",
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                url = "{{ URL::to('/') }}/master-relation-headmaster/" + $id;
                                $('#editHeadMasterModal').modal('show');
                                $('.modal-title').text('Form Edit Kepsek');
                                $('#formEdit').attr('action', url);
                                $('#inNIKEdit').val(data.nik);
                                $('#inNameEdit').val(data.name).attr('readonly','true');
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }

                    // NIK ketika ada event change
                    $("#inNIKEdit").change(function()
                    {				
                        nik = $(this).val();
                        $.ajax({
                            url: "{{ URL::to('/') }}/master-relation-headmaster/ustadz/search/" + nik,
                            dataType: "JSON",
                            success: function(response){
                                $('#editHeadMasterModal').modal('show');
                                $('.modal-title').text('Form Edit Kepsek');
                                $('#inNameEdit').val(response.name).attr('readonly','true');
                            } ,
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    })

                </script>
                @endsection