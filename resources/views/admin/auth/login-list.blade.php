                    <!-- Modal -->
                    <div class="modal show" id="lognListModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Login sebagai</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Keterangan</th>
                                                <th scope="row">Akses</th>
                                                <th scope="row"></th>
                                            </tr>
                                            @foreach(Session::get('success') as $akses)
                                            <tr>
                                                <td scope="row">{{ $akses['nama'] }}</td>
                                                <td scope="row">{{ $akses['akses_nama'] }}</td>
                                                <td scope="row" style="width:80px">
                                                    <form method="GET" action="login-request/{{ $akses['id'] . '/' . $akses['sekolah'] . '/' . $akses['kelas'] . '/' . $akses['akses'] }}">
                                                        <button type="submit" class="btn btn-success">Lanjut</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>