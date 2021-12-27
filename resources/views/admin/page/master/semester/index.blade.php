
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <h6 class="mb-0 text-uppercase">Daftar Semester</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                @include('admin/page/master/semester/semester-edit')
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
                                                <th>Kode</th>
                                                <th>Nama Semester</th>
                                                <th width="10%">Aksi</th>
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
                        // Menampilkan data Semester
                        table = $('#dataTable').DataTable({
                            columns: [{
                                title: "No"
                            }, {
                                title: "Kode"
                            }, {
                                title: "Nama Semester"
                            }, {
                                title: "Aksi"
                            }],
                            ajax: {
                                "url": "{{ URL::to('/') }}/master-semester/data",
                                "type": "GET"
                            }
                        });
                    
                    });

                    // Form Update Supplier
                    function addForm() {
                        $('#modal-add-supplier').modal('show');
                        $('.modal-title').text('Tambah Supplier');
                    }

                    // Form Edit Semester
                    function editForm($id) {
                        url = "{{ URL::to('/') }}/master-semester/" + $id;
                        $('.modal-title').text('Edit Semester');
                        $.ajax({
                            url: "{{ URL::to('/') }}/master-semester/" + $id + "/edit",
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                $('#editSemesterModal').modal('show');
                                $('.modal-title').text('Edit Semester');
                                $('#formEdit').attr('action', url);
                                $('#inKodeSemester').val(data.id).attr('readonly','true');
                                $('#inNamaSemester').val(data.name);
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }
                    
                </script>
            @endsection