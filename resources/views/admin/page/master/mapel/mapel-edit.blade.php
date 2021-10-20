                                    <!-- Modal -->
                                    <div class="modal fade" id="editMapelModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Edit Mapel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" id="formEdit" class="row g-3 needs-validation" novalidate>
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row mb-3 position-relative">
                                                        <label for="inCodeEdit" class="col-sm-3 col-form-label">Kode Mapel</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inCodeEdit" class="form-control" value="" id="inCodeEdit"/>
                                                            <div class="invalid-tooltip">Kode Mapel tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inNameEdit" class="col-sm-3 col-form-label">Nama Mapel</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inNameEdit" class="form-control"  maxlength="50" id="inNameEdit" placeholder="Bahasa Arab" required/>
                                                            <div class="invalid-tooltip">Nama Mapel tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soKelompokEdit" class="col-sm-3 col-form-label">Kelompok</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soKelompokEdit" id="soKelompokEdit" tabindex="-1">
                                                                @foreach ($kelompokMapels as $kelompokMapel)
                                                                    <option value="{{ $kelompokMapel->kelompok_id }}" >{{ $kelompokMapel->kelompok_name }}</option>
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