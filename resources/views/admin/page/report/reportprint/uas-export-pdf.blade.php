
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
                                            <td style="width:12%">Nama PKPPS</td>
                                            <td style="width:50%" class="text-bold">: {{ $data['biodata']['pps_nama'] }}</td>
                                            <td style="width:14%">Kelas</td>
                                            <td style="width:14%" class="text-bold">: {{ $data['biodata']['kelas_nama'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td class="text-bold">: {{ $data['biodata']['pps_alamat'] }}</td>
                                            <td>Semester</td>
                                            <td class="text-bold">: {{ $data['biodata']['semester'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td class="text-bold">: {{ $data['biodata']['santri_nama'] }}</td>
                                            <td>Tahun Pelajaran</td>
                                            <td class="text-bold">: {{ $data['biodata']['tahun_pelajaran'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Induk</td>
                                            <td class="text-bold">: {{ $data['biodata']['santri_no_induk'] }}</td>
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
                                        <th width="20%">Predikat</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-text-top text-center">{{ $data['sikap']['spiritual_pred'] }}</td>
                                        <td class="table-text-top" style="height:80px;">{{ $data['sikap']['spiritual_baik_desc'] }} <br><br><i>@if ($data['sikap']['spiritual_kurang_desc'] != '')<b>Kurang </b><br></i>{{ $data['sikap']['spiritual_kurang_desc'] }}@endif</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-bold">2. Sikap Sosial</div>
                            <table id="table-attendance" class="border" style="width:100%">
                                <thead class="text-center bg-light-info">
                                    <tr>
                                        <th width="20%">Predikat</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-text-top text-center">{{ $data['sikap']['sosial_pred'] }}</td>
                                        <td class="table-text-top" style="height:80px;">{{ $data['sikap']['sosial_baik_desc'] }} <br><br><i>@if ($data['sikap']['sosial_kurang_desc'] != '')<b>Kurang </b></i><br>{{ $data['sikap']['sosial_kurang_desc'] }}@endif</td>
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
                                        <th colspan="2">Pengetahuan</th>
                                        <th colspan="2">Keterampilan</th>
                                        <th rowspan="2" style="width: 12%">Rata-Rata</th>
                                    </tr>
                                    <tr>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['nilai'] as $nilais)
                                    <tr class="text-bold bg-light-info" >
                                        <td colspan="8" >{{ $nilais['kelompok'] }}</td>
                                    </tr>
                                    @foreach ($nilais['mapel'] as $mapel)
                                    <tr>
                                        <td>{{ $mapel['no'] }}</td>
                                        <td class="text-left">{{ $mapel['mapel_nama'] }}</td>
                                        <td>{{ $mapel['kkm'] }}</td>
                                        <td>{{ $mapel['pas'] }}</td>
                                        <td>{{ $mapel['pre_pengetahuan'] }}</td>
                                        <td>{{ $mapel['hpa'] }}</td>
                                        <td>{{ $mapel['pre_keterampilan'] }}</td>
                                        <td>{{ $mapel['average'] }}</td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                    <tr>
                                        <td colspan="3">Jumlah</td>
                                        <td>{{ $data['total_pengetahuan'] }}</td>
                                        <td></td>
                                        <td>{{ $data['total_keterampilan'] }}</td>
                                        <td></td>
                                        <td>{{ $data['total_average'] }}</td>
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
                                    @foreach ($data['kkm'] as $kkm) 
                                    <tr>
                                        <td>{{ $kkm['kkm'] }}</td>
                                        <td>{{ $kkm['D'] }}</td>
                                        <td>{{ $kkm['C'] }}</td>
                                        <td>{{ $kkm['B'] }}</td>
                                        <td>{{ $kkm['A'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="new-page"></div>
                            <div class="text-bold text-uppercase">C. Deskripsi Pengetahuan dan Keterampilan</div>
                            <table id="table-attendance" class="border" style="width:100%">
                                <tbody>
                                    @foreach ($data['nilai'] as $nilais)
                                    <tr class="text-bold bg-light-info">
                                        <th colspan="4">{{ $nilais['kelompok'] }}</th>
                                    </tr>
                                    @foreach ($nilais['mapel'] as $mapel)
                                    <tr>
                                        <td style="width: 1%" rowspan="2">{{ $mapel['no'] }}</td>
                                        <td style="width: 25%" rowspan="2">{{ $mapel['mapel_nama'] }}</td>
                                        <td style="width: 15%">Pengetahuan</td>
                                        <td style="width: 59%; height: 75px;">{{ $mapel['deskripsi_pengetahuan'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterampilan</td>
                                        <td style="height: 80px">{{ $mapel['deskripsi_keterampilan'] }}</td>
                                    </tr>
                                    @endforeach
                                    @endforeach
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
                                    @foreach ($data['extra'] as $extra)
                                    <tr>
                                        <td>{{ $extra['no'] }}</td>
                                        <td>{{ $extra['extra_nama'] }}</td>
                                        <td class="text-center">{{ $extra['extra_nilai'] }}</td>
                                        <td>{{ $extra['extra_deskripsi'] }}</td>
                                    </tr>
                                    @endforeach
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
                                    @foreach ($data['prestasi'] as $prestasi)
                                    <tr>
                                        <td>{{ $prestasi['no'] }}</td>
                                        <td>{{ $prestasi['prestasi_nama'] }}</td>
                                        <td>{{ $prestasi['prestasi_deskripsi'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="text-bold text-uppercase">E. Ketidakhadiran</div>
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
                                        <td class="text-center">{{ $data['kehadiran']['izin'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Izin</td>
                                        <td class="text-center">{{ $data['kehadiran']['sakit'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanpa Keterangan</td>
                                        <td class="text-center">{{ $data['kehadiran']['alfa'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="text-bold text-uppercase">F. Catatan Walikelas</div>
                            <table id="table-attendance" class="border" style="width:100%;">
                                <tbody>
                                    <tr>
                                        <td style="height:100px; vertical-align: top">Peringkat Nilai Ranking {{ $data['catatan_wali_kelas']['ranking'] . ". " . $data['catatan_wali_kelas']['catatan_ranking']  . ". " . $data['catatan_wali_kelas']['catatan_pilihan']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="new-page"></div>
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
                                            {{ $data['biodata']['ayah_nama'] }}
                                        </td>
                                        <td style="width:30%">
                                            {{ trim(strstr($data['biodata']['sekolah_kota'], " ")) . ", ". tanggal(substr(tanggal('now'), 0, 10)) }}<br>
                                            Wali Kelas<br><br><br><br><br>
                                            <b>{{ $data['biodata']['wali_kelas'] }}</b>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td colspan="2">
                                            Mengetahui:<br>
                                            Kepala {{ $data['biodata']['pps_tingkat'] }}<br><br><br><br><br>
                                            <b>{{ $data['biodata']['kepala_sekolah'] }}</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @endsection