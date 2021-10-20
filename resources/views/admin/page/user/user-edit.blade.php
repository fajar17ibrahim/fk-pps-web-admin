                                    <!-- Modal -->
                                    <div class="modal fade" id="editUserModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Edit user</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="formEdit" method="post" class="row g-3 needs-validation" novalidate>
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3 position-relative">
                                                        <label for="inEmailEdit" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="inEmailEdit" class="form-control" list="datalistOptions" id="inEmailEdit" placeholder="Cari Email...">
                                                            <div class="invalid-tooltip">Email tidak boleh kosong</div>
                                                            <datalist id="datalistOptions">
                                                            @foreach ($ustadzs as $ustadz)
                                                                <option value="{{ $ustadz->ustadz_email }}">
                                                            @endforeach
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3  position-relative">
                                                        <label for="inNameEdit" class="col-sm-3 col-form-label">Nama User</label>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="inNameEdit" class="form-control"  maxlength="50" id="inNameEdit" placeholder="Sugeng" required readonly/>
                                                            <div class="invalid-tooltip">Nama User tidak boleh kosong</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 position-relative">
                                                        <label for="soRoleEdit" class="col-sm-3 col-form-label">Role</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soRoleEdit" id="soRoleEdit" tabindex="-1">
                                                                @foreach ($roles as $role)
                                                                <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 position-relative">
                                                        <label for="soStatusEdit" class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9 text-secondary" >
                                                            <select class="form-select form-control" name="soStatusEdit" id="soStatusEdit" tabindex="-1">
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