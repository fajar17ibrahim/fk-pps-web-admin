
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
                                    <h6 class="mb-0">Pondok Pesantren</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
									<select class="single-select">
										@foreach ($schools as $school)
										<option value=" {{ $school->school_id }} ">{{ $school->school_name }}</option>
										@endforeach
									</select>
                                </div>
                            </div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Kelas</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<select class="single-select">
										@foreach ($kelass as $kelas)
										<option value=" {{ $kelas->class_id }} ">{{ $kelas->class_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" class="btn btn-success px-4" value="Tampilkan Data" />
									@include('admin/page/report/reportequipment/report-equipment-list')
								</div>
							</div>
						</div>
					</div>

					<div class="col">
						<h6 class="mb-0 text-uppercase">Daftar Pelengkap Rapor Kelas 7 A</h6>
						<br>
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="dataTable" class="table table-striped table-borderless " style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>NSM / NPSN</th>
												<th>Nama Santri</th>
												<th>L/P</th>
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
                    var table;
                    var status = 0;
                    $(function() {
                        // Menampilkan data Equipment
                        table = $('#dataTable').DataTable({
                            ajax: {
                                "url": "report-equipment/data",
                                "type": "GET"
                            }
                        });
                    
                    });

					// Form List Equipment
                    function listForm($id) {
                        $.ajax({
                            url: "report-equipment/" + $id,
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                $('#reportEquipmentListModal').modal('show');
								$('#lsCover').attr('href', 'report-equipment-cover/' + data[0].santri_nisn);
								$('#lsLembaga').attr('href', 'report-equipment-lembaga/' + data[0].santri_nisn);
								$('#lsSantri').attr('href', 'report-equipment-santri/' + data[0].santri_nisn);
								$('#lsMutation').attr('href', 'report-equipment-mutation/' + data[0].santri_nisn);
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    }

                </script>
                @endsection