
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    
                    <div class="container">
                        <div class="main-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="assets/images/avatars/avatar-santri.jpg" alt="" class="p-1 border bg-white mt-4"  width="120" height="150">
                                                <div class="mt-4">
                                                    <h5>AHMAD MAULANA PUTRA</h5>
                                                    <p class="text-secondary mb-1">Santri</p>
                                                    <p class="text-secondary mb-1">PKPPS MINHAAJUSHSHOOBIRIIN</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body"><h4 class="mb-0 text-uppercase text-center mt-4">Informasi Data Santri</h4>
                                            <div class="mt-4">
                                                <h5 class="text-success">Data Santri</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>      
                                                        <tr>
                                                            <td style="width:30%">Nama Santri</td>
                                                            <td style="width:70%">: AHMAD MAULANA PUTRA</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NISM</td>
                                                            <td>: 510031750032190026</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NISN</td>
                                                            <td>: 0044291810</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No. KIP</td>
                                                            <td>: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No. PKH</td>
                                                            <td>: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIK</td>
                                                            <td>: 1571021901040001</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tempat Tanggal Lahir</td>
                                                            <td>: JAMBI, 02 Januari 2006</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td>: Laki - Laki</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Agama</td>
                                                            <td>: Islam</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hobi</td>
                                                            <td>: Olahraga</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cita - Cita</td>
                                                            <td>: Ilmuwan</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kewarganegaraan</td>
                                                            <td>: WNI</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kebutuhan Khusus</td>
                                                            <td>: Tidak Ada</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status Rumah</td>
                                                            <td>: Asrama milik lembaga</td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5 class="text-success">Data Ayah Kandung</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">No. KK</td>
                                                            <td style="width:70%">: 1571022412050051</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">NIK Ayah</td>
                                                            <td style="width:70%">: 1571022603650021</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Nama Ayah</td>
                                                            <td style="width:70%">: SARJU</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pekerjaan Ayah</td>
                                                            <td style="width:70%">: PNS</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pendidikan Ayah</td>
                                                            <td style="width:70%">: D4 / S1</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Telepon Ayah</td>
                                                            <td style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Rata - Rata Penghasilan</td>
                                                            <td style="width:70%">: Rp. 3.000.000 - Rp. 4.000.000</td>
                                                        </tr>   
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5 class="text-success">Data Ibu Kandung</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">NIK Ibu</td>
                                                            <td style="width:70%">: 1571022603650021</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Nama Ibu</td>
                                                            <td style="width:70%">: SARJU</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pekerjaan Ibu</td>
                                                            <td style="width:70%">: PNS</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pendidikan Ibu</td>
                                                            <td style="width:70%">: D4 / S1</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Telepon Ibu</td>
                                                            <td style="width:70%">: -</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5 class="text-success">Data Wali</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">Hubungan Wali</td>
                                                            <td style="width:70%">: 1571022412050051</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">NIK Wali</td>
                                                            <td style="width:70%">: 1571022603650021</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Nama Wali</td>
                                                            <td style="width:70%">: SARJU</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pekerjaan Wali</td>
                                                            <td style="width:70%">: PNS</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pendidikan Ayah</td>
                                                            <td style="width:70%">: D4 / S1</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Rata - Rata Penghasilan</td>
                                                            <td style="width:70%">: Rp. 3.000.000 - Rp. 4.000.000</td>
                                                        </tr>   
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5 class="text-success">Data Alamat</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">Alamat Rumah</td>
                                                            <td style="width:70%">: JL. MASJID H SHOBIRIN</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">RT / RW</td>
                                                            <td style="width:70%">: 013 / 010</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Propinsi</td>
                                                            <td style="width:70%">: DKI Jakarta</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Kabupaten/Kota</td>
                                                            <td style="width:70%">: Kota Jakarta Timur</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Kecamatan</td>
                                                            <td style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Kode Pos</td>
                                                            <td style="width:70%">: 13720</td>
                                                        </tr>   
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection