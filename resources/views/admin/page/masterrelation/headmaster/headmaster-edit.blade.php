                                    <!-- Modal -->
                                    <div class="modal fade" id="editHeadMasterModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Edit Kepsek</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="formEdit" method="post" class="row g-3 needs-validation" novalidate>
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inNIKEdit" class="col-sm-3 col-form-label">NIK</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="inNIKEdit" class="form-control" list="datalistOptions" id="inNIKEdit" placeholder="Cari NIK...">
                                                            <div class="invalid-tooltip">NIK tidak boleh kosong</div>
                                                            <datalist id="datalistOptions">
                                                            @foreach ($ustadzs as $ustadz)
                                                                <option value="{{ $ustadz->ustadz_nik }}">{{ $ustadz->ustadz_name}}</option>
                                                            @endforeach
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3  position-relative">
                                                        <label for="inNameEdit" class="col-sm-3 col-form-label">Nama Kepsek</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inNameEdit" class="form-control"  maxlength="50" id="inNameEdit" placeholder="Sugeng" required readonly/>
                                                            <div class="invalid-tooltip">Nama tidak boleh kosong</div>
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