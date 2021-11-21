                                    <!-- Modal -->
                                    <div class="modal fade" id="addUserModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Tambah User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="{{ route('user.store') }}" class="row g-3 needs-validation" novalidate>
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inEmail" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="inEmail" class="form-control" list="datalistOptions" id="inEmail" placeholder="Cari Email..." required>
                                                            <div class="invalid-tooltip">Email tidak boleh kosong</div>
                                                            <datalist id="datalistOptions">
                                                            @foreach ($ustadzs as $ustadz)
                                                                <option value="{{ $ustadz->ustadz_email }}">
                                                            @endforeach
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3  position-relative">
                                                        <label for="inName" class="col-sm-3 col-form-label">Nama User</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inName" class="form-control"  maxlength="50" id="inName" placeholder="Sugeng" required readonly/>
                                                            <div class="invalid-tooltip">Nama User tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 position-relative">
                                                        <label for="soRole" class="col-sm-3 col-form-label">Role</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soRole" id="soRole" tabindex="-1">
                                                                @foreach ($roles as $role)
                                                                <option value="{{ $role['role_id'] }}">{{ $role['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 position-relative">
                                                        <label for="soStatus" class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soStatus" id="soStatus" tabindex="-1">
                                                                <option value="Aktif">Aktif</option>
                                                                <option value="Nonactive">Nonactive</option>
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