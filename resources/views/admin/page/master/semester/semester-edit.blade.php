                                    <!-- Modal -->
                                    <div class="modal fade" id="editSemesterModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Edit Semester</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" id="formEdit" class="row g-3 needs-validation" novalidate> 
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inKodeSemester" class="col-sm-4 col-form-label">Kode Semester</label>
                                                        <div class="col-sm-8 text-secondary">
                                                            <input type="text" name="inKodeSemester" class="form-control" value="" id="inKodeSemester"/>
                                                            <div class="invalid-tooltip">Kode Semester tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inNamaSemester" class="col-sm-4 col-form-label">Nama Semester</label>
                                                        <div class="col-sm-8 text-secondary">
                                                            <input type="text" name="inNamaSemester" class="form-control" placeholder="Ganjil" id="inNamaSemester" maxlength="10" required/>
                                                            <div class="invalid-tooltip">Nama Semester tidak boleh kosong</div>
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