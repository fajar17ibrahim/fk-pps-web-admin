                                    <!-- Modal -->
                                    <div class="modal fade" id="editWaliKelasModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pilih Wali Kelas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" id="formEdit" class="row g-3 needs-validation" novalidate>
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="soClassName" class="col-sm-3 col-form-label">Kelas</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select name="soClassName" class="form-select form-control" id="soClassName" tabindex="-1">
                                                                @foreach ($kelass as $kelas)
                                                                <option value="{{ $kelas->class_id }}">{{ $kelas->class_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soHomeroomTeacher" class="col-sm-3 col-form-label">Wali Kelas</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select name="soHomeroomTeacher" class="form-select form-control" id="soHomeroomTeacher" tabindex="-1">
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