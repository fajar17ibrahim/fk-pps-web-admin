                                    <!-- Modal -->
                                    <div class="modal fade" id="addTeacherModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Ustadz(ah)</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form form method="post" action="{{ URL::to('/') }}/master-ustadz-edit/add" class="row g-3 needs-validation" novalidate>
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="soUstadz" class="col-sm-2 col-form-label">Cari NIK</label>
                                                        <div class="col-sm-10 text-secondary" >
                                                            <input name="inUstadz" class="form-control" list="datalistOptions" id="inUstadz" placeholder="Masukan NIK Ustadz(ah)..." required>
                                                            <datalist id="datalistOptions">
                                                            @foreach ($ustadzs as $ustadz)
                                                                <option value="{{ $ustadz['nik'] }}">{{ $ustadz['name'] }}</option>
                                                            @endforeach
                                                            </datalist>
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