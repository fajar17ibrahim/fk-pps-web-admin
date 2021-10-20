                                    <!-- Modal -->
                                    <div class="modal fade" id="editSchoolYearModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Edit Tahun Pelajaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" id="formEdit" class="row g-3 needs-validation" novalidate>
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row mb-3 position-relative">
                                                            <label for="inCodeEdit" class="col-sm-4 col-form-label">Kode </label>
                                                            <div class="col-sm-8 text-secondary">
                                                                <input type="text" name="inCodeEdit" class="form-control" id="inCodeEdit"/>
                                                                <div class="invalid-tooltip">Kode Tahun Pelajaran tidak boleh kosong</div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 position-relative">
                                                            <label for="inNameEdit" class="col-sm-4 col-form-label">Tahun Pelajaran</label>
                                                            <div class="col-sm-8 text-secondary">
                                                                <input type="text" name="inNameEdit" class="form-control" id="inNameEdit" maxlength="20" placeholder="2020/2021" required/>
                                                                <div class="invalid-tooltip">Nama Tahun Pelajaran tidak boleh kosong</div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="soSemesterEdit" class="col-sm-4 col-form-label">Semester</label>
                                                            <div class="col-sm-8 text-secondary" >
                                                                <select class="form-select form-control" name="soSemesterEdit" id="soSemesterEdit" tabindex="-1">
                                                                @foreach ($semesters as $semester)
                                                                    <option value="{{ $semester->semester_id }}" >{{ $semester->semester_name }}</option>
                                                                @endforeach 
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>