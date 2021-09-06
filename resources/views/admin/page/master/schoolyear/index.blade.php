
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <h6 class="mb-0 text-uppercase">Daftar Tahun Ajaran</h6>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-attendance" class="table table-striped table-borderless " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>GJL2019</td>
                                                <td>2019/2020</td>
                                                <td>Ganjil</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">Aksi</button>
                                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Details</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Aktif</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Nonaktif</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td><td>GNP2019</td>
                                                <td>2019/2020</td>
                                                <td>Genap</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">Aksi</button>
                                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Details</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Aktif</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Nonaktif</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td><td>GJL2020</td>
                                                <td>2020/2021</td>
                                                <td>Ganjil</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">Aksi</button>
                                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Details</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Aktif</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Nonaktif</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td><td>GNP2020</td>
                                                <td>2020/2021</td>
                                                <td>Genap</td>
                                                <td>
                                                    <div class="col">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">Aksi</button>
                                                            <button type="button" class="btn btn-success split-bg-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Details</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Aktif</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Nonaktif</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection