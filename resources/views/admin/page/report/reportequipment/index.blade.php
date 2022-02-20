
				@extends('admin.layouts.dashboard')

				@section('content')
				<div class="col-lg-12">
                    @if(Session::get('user')['akses'] == 1 || Session::get('user')['akses'] == 2)
					<div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <h5 class="mb-1">Filter</h5>
                                </div>
                            </div>
                            <hr>
                            <br>
                            @if(Session::get('user')['akses'] == 1)
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Jenjang</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select" name="soLevelFilter" id="soLevelFilter">
                                        <option value="0">Semua</option>
                                        <option value="Ula">Ula</option>
                                        <option value="Wustha">Wustha</option>
                                        <option value="Ulya">Ulya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">PKPPS</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select" name="soSchoolFilter" id="soSchoolFilter">
									<option value="0">Semua</option>	
                                        @foreach ($schools as $school)
                                        <option value="{{ $school['id'] }}">{{ $school['pps_nama'] }}</option>
										@endforeach
									</select>
                                </div>
                            </div>
                            @endif
                            @if(Session::get('user')['akses'] == 1 || Session::get('user')['akses'] == 2)
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Kelas</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="single-select" name="soKelasFilter" id="soKelasFilter">
                                        <option value="0">Semua</option>
                                        @foreach ($kelass as $kelas)
                                        <option value="{{ $kelas['id'] }}">{{ $kelas['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="button" onclick="filter()" class="btn btn-success px-4">Tampilkan Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

					<div class="col">
						<h6 class="mb-0 text-uppercase">Daftar Pelengkap Rapor</h6>
						<br>
						<div class="card">
							<div class="card-body">
                                @include('admin/page/report/reportequipment/report-equipment-list')
								<div class="table-responsive">
									<table id="dataTable" class="table table-striped table-borderless " style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>NIS / NISN</th>
												<th>Nama Santri</th>
												<th>Tanggal Download</th>
												<th>Link Download</th>
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
                    var level = 0;
                    var school = 0;
                    var kelas = 0;
                    var table;
                    $(function() {
                        // Menampilkan data Equipment
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "{{ URL::to('/') }}/report-equipment/data/" + level + "/" + school + "/" + kelas,
                                "type": "GET"
                            }
                        });
                    
                    });

					// Filter
                    function filter() {				
                        level = $('#soLevelFilter').val();
                        school = $('#soSchoolFilter').val();
                        kelas = $('#soKelasFilter').val();
                        $.ajax({
                            url: "{{ URL::to('/') }}/report-equipment/data/" + level + "/" + school + "/" + kelas,
                            success: function(response){
                                table.ajax.url("{{ URL::to('/') }}/report-equipment/data/" + level + "/" + school+ "/" + kelas).load(); 
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    };

					// Form List Equipment
                    function listForm($id) {
                        $.ajax({
                            url: "{{ URL::to('/') }}/report-equipment/" + $id,
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                $('#reportEquipmentListModal').modal('show');
								$('#lsCover').attr('href', 'report-equipment-cover/' + data.nisn);
								$('#lsLembaga').attr('href', 'report-equipment-lembaga/' + data.nisn);
								$('#lsSantri').attr('href', 'report-equipment-santri/' + data.nisn);
								$('#lsMutation').attr('href', 'report-equipment-mutation/' + data.nisn);
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }

                </script>
                @endsection