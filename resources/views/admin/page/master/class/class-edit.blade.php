                                    <!-- Modal -->
                                    <div class="modal fade" id="editClassModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Edit Kelas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" id="formEdit" class="row g-3 needs-validation" novalidate>
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inCodeEdit" class="col-sm-3 col-form-label">Kode Kelas</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inCodeEdit" class="form-control" value="" id="inCodeEdit" required/>
                                                            <div class="invalid-tooltip">Kode Kelas tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inNameEdit" class="col-sm-3 col-form-label">Nama Kelas</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inNameEdit" class="form-control" value="" id="inNameEdit"  placeholder="I A" maxlength="10" oninput="this.value = this.value.toUpperCase()" required/>
                                                            <div class="invalid-tooltip">Nama Kelas tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soLevelEdit" class="col-sm-3 col-form-label">Jenjang</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" id="soLevelEdit" name="soLevelEdit" tabindex="-1">
                                                                <option value="Ula" class="form-control">Ula</option>
                                                                <option value="Wustha" class="form-control">Wustha</option>
                                                                <option value="Ulya" class="form-control"  >Ulya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soLevel" class="col-sm-3 col-form-label">PKPPS</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soSchoolEdit" id="soSchoolEdit">
                                                                @foreach ($schools as $school)
                                                                <option value="{{ $school->school_npsn }}">{{ $school->school_name }}</option>
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