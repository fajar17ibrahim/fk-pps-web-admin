                                    <!-- Modal -->
                                    <div class="modal fade" id="addMapelModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Tambah Mapel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form form method="post" action="{{ route('master-mapel.store') }}" class="row g-3 needs-validation" novalidate>
                                                @csrf
                                                <div class="modal-body">
                                                    <!-- <div class="row mb-3  position-relative">
                                                        <label for="inputAlasan" class="col-sm-3 col-form-label">Kode Mapel</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control" value="" id="inputAlasan"/>
                                                            <div class="invalid-tooltip">Nama Kelas tidak boleh kosong</div>
                                                        </div>
                                                    </div> -->
                                                    <div class="row mb-3  position-relative">
                                                        <label for="inName" class="col-sm-3 col-form-label">Nama Mapel</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inName" class="form-control"  maxlength="50" id="inName" placeholder="Bahasa Arab" required/>
                                                            <div class="invalid-tooltip">Nama Mapel tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 position-relative">
                                                        <label for="soKelompok" class="col-sm-3 col-form-label">Kelompok</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soKelompok" id="soKelompok" tabindex="-1">
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