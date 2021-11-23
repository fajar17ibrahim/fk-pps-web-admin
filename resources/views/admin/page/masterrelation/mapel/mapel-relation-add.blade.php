                                    <!-- Modal -->
                                    <div class="modal fade" id="addMapelTeacherModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pilih Guru Mapel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form form method="post" action="{{ route('master-relation-mapel.store') }}" class="row g-3 needs-validation" novalidate>
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="soMapel" class="col-sm-3 col-form-label">Mapel</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select name="soMapel" class="form-select form-control" id="soMapel">
                                                                @foreach ($mapels as $mapel)
                                                                <option value="{{ $mapel->mapel_id }}">{{ $mapel->mapel_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soKelas" class="col-sm-3 col-form-label">Kelas</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select name="soKelas" class="form-select form-control" id="soKelas">
                                                                @foreach ($kelass as $kelas)
                                                                <option value="{{ $kelas['id'] }}">{{ $kelas['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soUstadz" class="col-sm-3 col-form-label">Pengajar</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select name="soUstadz" class="form-select form-control" id="soUstadz" tabindex="-1">
                                                                @foreach ($ustadzs as $ustadz)
                                                                <option value="{{ $ustadz['nik'] }}">{{ $ustadz['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-success" value="Simpan" />
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>