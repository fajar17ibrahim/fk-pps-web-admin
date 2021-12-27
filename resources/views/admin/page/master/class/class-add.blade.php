                                    <!-- Modal -->
                                    <div class="modal fade" id="addClassModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content form-body">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Tambah Kelas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="{{ route('master-class.store') }}" class="row g-3 needs-validation" novalidate>
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inName" class="col-sm-3 col-form-label">Nama Kelas</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inName" class="form-control" maxlength="10" oninput="this.value = this.value.toUpperCase()" id="inName"  placeholder="I A" required/>
                                                            <div class="invalid-tooltip">Nama Kelas tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soLevel" class="col-sm-3 col-form-label">Jenjang</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soLevel" id="soLevel" tabindex="-1">
                                                                @if(Session::get('user')[0]['role_id'] != 1)
                                                                <option value="{{ Session::get('user')[0]['school_level'] }}" class="form-control">{{ Session::get('user')[0]['school_level'] }}</option>
                                                                @else
                                                                <option value="Ula" class="form-control">Ula</option>
                                                                <option value="Wustha" class="form-control">Wustha</option>
                                                                <option value="Ulya" class="form-control"  >Ulya</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="soLevel" class="col-sm-3 col-form-label">PKPPS</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soSchool" id="soSchool">
                                                                @foreach ($schools as $school)
                                                                <option value="{{ $school['id'] }}">{{ $school['pps_nama'] }}</option>
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