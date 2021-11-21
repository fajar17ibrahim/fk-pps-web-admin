
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    
                    <div class="container">
                        <div class="main-body">
                            <form name="formReportValue" method="post" action="{{ route('report-value-settings.save') }}" onsubmit="return validateForm()">
                                @csrf
                                <div class="row">
                                    <!-- <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center">
                                                    <h5 class="mb-0 text-success">Pengaturan Interval Nilai</h5>
                                                </div>
                                                <hr>
                                                <div class="row mb-3">
                                                    <label for="inputValueStart" class="col-sm-3 col-form-label">Grade A</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="text" class="form-control" value="" id="inputValueStart"/>
                                                    </div>
                                                    <label for="inputValueEnd" class="col-sm-2 col-form-label">-</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="text" class="form-control" value="" id="inputValueEnd"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputValueStart" class="col-sm-3 col-form-label">Grade B</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="text" class="form-control" value="" id="inputValueStart"/>
                                                    </div>
                                                    <label for="inputValueEnd" class="col-sm-2 col-form-label">-</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="text" class="form-control" value="" id="inputValueEnd"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputValueStart" class="col-sm-3 col-form-label">Grade C</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="text" class="form-control" value="" id="inputValueStart"/>
                                                    </div>
                                                    <label for="inputValueEnd" class="col-sm-2 col-form-label">-</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="text" class="form-control" value="" id="inputValueEnd"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputValueStart" class="col-sm-3 col-form-label">Grade D</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="text" class="form-control" value="" id="inputValueStart"/>
                                                    </div>
                                                    <label for="inputValueEnd" class="col-sm-2 col-form-label">-</label>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="text" class="form-control" value="" id="inputValueEnd"/>
                                                    </div>
                                                </div>
                                                <div class=" d-sm-flex align-items-center">
                                                    <input type="button" class="btn btn-success px-4 ms-auto" value="Simpan Perubahan" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center">
                                                    <h5 class="mb-0 text-success">Pengaturan HPA</h5>
                                                </div>
                                                <hr>
                                                <div class="row mb-3">
                                                    <div class="col-sm-4 text-secondary">
                                                        <label for="inputValueStart" class="col-form-label">RPH (%)</label>
                                                        <input type="text" class="form-control" value="" id="inputValueStart"/>
                                                    </div>
                                                    <div class="col-sm-4 text-secondary">
                                                        <label for="inputValueStart" class="col-form-label">PTS (%)</label>
                                                        <input type="text" class="form-control" value="" id="inputValueStart"/>
                                                    </div>
                                                    <div class="col-sm-4 text-secondary">
                                                        <label for="inputValueStart" class="col-form-label">PAS (%)</label>
                                                        <input type="text" class="form-control" value="" id="inputValueStart"/>
                                                    </div>
                                                </div>
                                                <div class=" d-sm-flex align-items-center">
                                                    <input type="button" class="btn btn-success px-4 ms-auto" value="Simpan Perubahan" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center">
                                                    <h5 class="mb-0 text-success">Pengaturan Ringkasan KD Pengetahuan yang dinilai</h5>
                                                </div>
                                                <hr>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-1</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP1" type="text" class="form-control" value="{{ $kdKnowledges[0]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-2</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP2" type="text" class="form-control" value="{{ $kdKnowledges[1]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-3</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP3" type="text" class="form-control" value="{{ $kdKnowledges[2]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-4</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input  name="inKDP4" type="text" class="form-control" value="{{ $kdKnowledges[3]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-5</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP5" type="text" class="form-control" value="{{ $kdKnowledges[4]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-6</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP6" type="text" class="form-control" value="{{ $kdKnowledges[5]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-7</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP7" type="text" class="form-control" value="{{ $kdKnowledges[6]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-8</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP8" type="text" class="form-control" value="{{ $kdKnowledges[7]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-9</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP9" type="text" class="form-control" value="{{ $kdKnowledges[8]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">P-10</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDP10" type="text" class="form-control" value="{{ $kdKnowledges[9]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center">
                                                    <h5 class="mb-0 text-success">Pengaturan Ringkasan KD Keterampilan yang dinilai</h5>
                                                </div>
                                                <hr>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-1</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK1" type="text" class="form-control" value="{{ $kdSkills[0]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-2</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK2" type="text" class="form-control" value="{{ $kdSkills[1]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-3</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK3" type="text" class="form-control" value="{{ $kdSkills[2]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-4</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK4" type="text" class="form-control" value="{{ $kdSkills[3]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-5</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK5" type="text" class="form-control" value="{{ $kdSkills[4]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-6</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK6" type="text" class="form-control" value="{{ $kdSkills[5]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-7</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK7" type="text" class="form-control" value="{{ $kdSkills[6]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-8</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK8" type="text" class="form-control" value="{{ $kdSkills[7]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-9</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK9" type="text" class="form-control" value="{{ $kdSkills[8]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputAlasan" class="col-sm-2 col-form-label">K-10</label>
                                                    <div class="col-sm-10 text-secondary">
                                                        <input name="inKDK10" type="text" class="form-control" value="{{ $kdSkills[9]['kd_desc'] }}" id="inputAlasan"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                <div class="d-flex align-items-center">
                                    <input type="submit" class="btn btn-success px-4 ms-auto" value="Simpan" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endsection