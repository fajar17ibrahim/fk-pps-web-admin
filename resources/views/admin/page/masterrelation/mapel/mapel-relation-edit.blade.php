                                    <!-- Modal -->
                                    <div class="modal fade" id="editMapelTeacherModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Guru Mapel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" id="formEdit" class="row g-3 needs-validation" novalidate>
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="soMapelEdit" class="col-sm-3 col-form-label">Mapel</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select name="soMapelEdit" class="form-select form-control" id="soMapelEdit">
                                                                @foreach ($mapels as $mapel)
                                                                <option value="{{ $mapel->mapel_id }}">{{ $mapel->mapel_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soKelasEdit" class="col-sm-3 col-form-label">Kelas</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select name="soKelasEdit" class="form-select form-control" id="soKelasEdit">
                                                                @foreach ($kelass as $kelas)
                                                                <option value="{{ $kelas->class_id }}">{{ $kelas->class_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soUstadzEdit" class="col-sm-3 col-form-label">Pengajar</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select name="soUstadzEdit" class="form-select form-control" id="soUstadzEdit" tabindex="-1">
                                                                @foreach ($ustadzs as $ustadz)
                                                                <option value="{{ $ustadz->ustadz_nik }}">{{ $ustadz->ustadz_name }}</option>
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