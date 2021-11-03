
				@extends('admin.layouts.pdf')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mb-0 text-uppercase text-center">Capaian Hasil Belajar</h2>
                                <table id="table-attendance" class="borderless" style="width:100%;">
                                    <tbody>
                                        <tr >
                                            <td style="width:15%">Nama PKPPS</td>
                                            <td style="width:40%" class="text-bold">: {{ $reportPrint[0]->school_name }}</td>
                                            <td style="width:15%">Kelas</td>
                                            <td style="width:20%" class="text-bold">: {{ $reportPrint[0]->class_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td class="text-bold">: {{ $reportPrint[0]->school_address }}</td>
                                            <td>Semester</td>
                                            <td class="text-bold">: 1 (Satu)</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td class="text-bold">: {{ $reportPrint[0]->santri_name }}</td>
                                            <td>Tahun Pelajaran</td>
                                            <td class="text-bold">: 2018-2019</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Induk</td>
                                            <td class="text-bold">: {{ $reportPrint[0]->santri_nism }}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="text-bold text-uppercase">A. Sikap</div>
                            <div class="text-bold">1. Sikap Spiritual</div>
                            <table id="table-attendance" class="border" style="width:100%">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th>Predikat</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-text-top text-center">Sangat Baik</td>
                                        <td class="table-text-top" style="height:80px;">Selalau menjalankan ibadah</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-bold">2. Sikap Sosial</div>
                            <table id="table-attendance" class="border" style="width:100%">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th>Predikat</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-text-top text-center">Sangat Baik</td>
                                        <td class="table-text-top" style="height:80px;">Selalau menjalankan ibadah</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-bold text-uppercase">B. Pengetahuan dan Keterampilan</div>
                            <table id="table-attendance" class="border text-center" style="width:100%">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2" style="width: 30%">Mata Pelajaran</th>
                                        <th rowspan="2">KKM</th>
                                        <th rowspan="2">JP (B)</th>
                                        <th colspan="2">Pengetahuan</th>
                                        <th colspan="2">Keterampilan</th>
                                        <th rowspan="2" style="width: 12%">Rata-Rata (N)</th>
                                        <th rowspan="2" style="width: 8%">N x B</th>
                                    </tr>
                                    <tr>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-bold bg-light-info" >
                                        <td colspan="10" >Kelompok A (Umum)</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr class="text-bold bg-light-info" >
                                        <td colspan="10">Kelompok B (Umum)</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                        
                                    <tr>
                                        <td>9</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>10</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>11</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>12</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="table-attendance" class="border text-center" style="width:100%">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2" style="width: 30%">Mata Pelajaran</th>
                                        <th rowspan="2">KKM</th>
                                        <th rowspan="2">JP (B)</th>
                                        <th colspan="2">Pengetahuan</th>
                                        <th colspan="2">Keterampilan</th>
                                        <th rowspan="2" style="width: 12%">Rata-Rata (N)</th>
                                        <th rowspan="2" style="width: 8%">N x B</th>
                                    </tr>
                                    <tr>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-bold bg-light-info" >
                                        <td colspan="10">Kelompok C (Peminatan)</td>
                                    </tr>
                                    <tr class="text-bold" >
                                        <td colspan="10">I. Peminatan Matematika dan Ilmu Alam</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td class="text-left">Bahasa Arab</td>
                                        <td>80</td>
                                        <td>90</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>A</td>
                                        <td>90</td>
                                        <td>90</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Jumlah</td>
                                        <td>30</td>
                                        <td>1264</td>
                                        <td></td>
                                        <td>1259</td>
                                        <td></td>
                                        <td>1262</td>
                                        <td>2524</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="table-attendance" class="border text-center" style="width:70%;">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th rowspan="2">KKM</th>
                                        <th colspan="4">Predikat</th>
                                    </tr>
                                    <tr>
                                        <th>Kurang (D)</th>
                                        <th>Cukup (C)</th>
                                        <th>Baik (B)</th>
                                        <th style="width:25%">Sangat Baik (A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>73</td>
                                        <td>Kurang dari 73</td>
                                        <td>70 - 80</td>
                                        <td>81 - 90</td>
                                        <td>91 - 100</td>
                                    </tr>
                                    <tr>
                                        <td>75</td>
                                        <td>Kurang dari 75</td>
                                        <td>70 - 80</td>
                                        <td>81 - 90</td>
                                        <td>91 - 100</td>
                                    </tr>
                                    <tr>
                                        <td>80</td>
                                        <td>Kurang dari 80</td>
                                        <td>70 - 80</td>
                                        <td>81 - 90</td>
                                        <td>91 - 100</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br><br>
                            <div class="text-bold text-uppercase">C. Deskripsi Pengetahuan dan Keterampilan</div>
                            <table id="table-attendance" class="border" style="width:100%">
                                <tbody>
                                    <tr class="text-bold bg-light-info">
                                        <th colspan="4">Kelompok A (Umum)</th>
                                    </tr>
                                    <tr>
                                        <td style="width: 1%" rowspan="2">1</td>
                                        <td style="width: 20%" rowspan="2">Bahasa Arab</td>
                                        <td style="width: 15%">Pengetahuan</td>
                                        <td style="width: 64%; height: 80px;">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">2</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">3</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">4</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 100px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 100px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 100px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 100px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">6</td>
                                        <td rowspan="2">Bahasa x x x x</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">7</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr class="text-bold bg-light-info">
                                        <th colspan="4">Kelompok B (Umum)</th>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">1</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">2</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">3</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">4</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">5</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr class="text-bold bg-light-info">
                                        <th colspan="4">Kelompok C (Peminatan)</th>
                                    </tr>
                                    <tr class="text-bold">
                                        <th colspan="4" >I. Peminatan Matematika dan Ilmu Alam</th>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">1</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">2</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">3</td>
                                        <td rowspan="2">Bahasa Arab</td>
                                        <td>Pengetahuan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">Lorem ipsum</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="text-bold text-uppercase">D. Ekstrakurikuler</div>
                            <table id="table-attendance" class="border" style="width:100%">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th style="width:1%;">No</th>
                                        <th>Kegiatan Ekstrakurikuler</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pramuka</td>
                                        <td>80</td>
                                        <td>Juara 1 LT</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Pramuka</td>
                                        <td>80</td>
                                        <td>Juara 1 LT</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Pramuka</td>
                                        <td>80</td>
                                        <td>Juara 1 LT</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="text-bold text-uppercase">E. Prestasi</div>
                            <table id="table-attendance" class="border" style="width:100%">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th style="width:1%;">No</th>
                                        <th>Jenis Prestasi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kesenian</td>
                                        <td>Juara 1 LT</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Keagamaan</td>
                                        <td>Juara 1 LT</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="text-bold">E. Ketidakhadiran</div>
                            <table id="table-attendance" class="border" style="width:50%">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th>Jenis Prestasi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sakit</td>
                                        <td>5 Hari</td>
                                    </tr>
                                    <tr>
                                        <td>Izin</td>
                                        <td>5 Hari</td>
                                    </tr>
                                    <tr>
                                        <td>Tanpa Keterangan</td>
                                        <td>5 Hari</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <br><br>
                            <div class="text-bold text-uppercase">F. Catatan Walikelas</div>
                            <table id="table-attendance" class="border" style="width:100%;">
                                <tbody>
                                    <tr>
                                        <td style="height:100px; vertical-align: top">Peringkat Nilai : dari 30 Siswa. Prestasinya sangat baik</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-bold text-uppercase">G. Tanggapan Orangtua / Wali</div>
                            <table id="table-attendance" class="border" style="width:100%; ">
                                <tbody>
                                    <tr>
                                        <td style="height:100px; vertical-align: top"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="table-attendance" class="borderless" style="width:100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            Mengetahui:<br>
                                            Orang Tua / Wali<br><br><br><br><br>
                                            {{ $reportPrint[0]->father_name }}
                                        </td>
                                        <td style="width:30%">
                                            Jakarta Timur, 18 September 2021<br>
                                            Wali Kelas<br><br><br><br><br>
                                            <b>RULI</b>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td colspan="2">
                                            Mengetahui:<br>
                                            Kepala Ulya<br><br><br><br><br>
                                            <b>Adi Saputra S.Pd</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
                @endsection