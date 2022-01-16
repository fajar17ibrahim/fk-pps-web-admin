
				@extends('admin.layouts.pdf')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <table id="table-attendance"  class="borderless" style="width:100%:">
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-center"><img src="assets/images/lambang-pancasila.jpg" width="80" heigh="80"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-center"><h2 class="mb-0 text-uppercase text-center">Kumpulan Nilai Tengah Semester</h2></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <table id="table-attendance" class="borderless" style="width:100%; line-height:50%">
                                        <tbody>
                                            <tr valign="top">
                                                <td style="width:14%" >Nama PKPPS<p style=" line-height:50%">Alamat</td>
                                                <td style="width:1%" >:<p style=" line-height:50%">:</td>
                                                <td style="width:46%;" class="text-bold" >{{ $data['biodata']['pps_nama'] }}<p style=" line-height:120%; margin:5px 0px 5px 0px">{{ $data['biodata']['pps_alamat'] }}</td>
                                                <td style="width:14%;" rowspan="3">Kelas<p>Semester<p>Tahun Pelajaran</td>
                                                <td style="width:1%;" rowspan="3" >:<p>:<p>:</td>
                                                <td style="width:14%;" rowspan="3" class="text-bold">{{ $data['biodata']['kelas_nama'] }}<p>{{ $data['biodata']['semester'] }}<p>{{ $data['biodata']['tahun_pelajaran'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td class="text-bold">{{ $data['biodata']['santri_nama'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Induk</td>
                                                <td>:</td>
                                                <td class="text-bold">{{ $data['biodata']['santri_no_induk'] }}</td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="table-attendance" class="border text-center" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="3">No</th>
                                                <th rowspan="3" style="width: 30%">Mata Pelajaran</th>
                                                <th rowspan="3">KKM</th>
                                                <th colspan="10">Hasil Penilaian Harian</th>
                                                <th rowspan="3">PTS</th>
                                                <th rowspan="3">HPTS</th>
                                            </tr>
                                            <tr>
                                                <th colspan="5">Pengetahuan</th>
                                                <th colspan="5">Keterampilan</th>
                                            </tr>
                                            <tr>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['nilai'] as $nilai)
                                            <tr>
                                                <td>{{ $nilai['no'] }}</td>
                                                <td class="text-left">{{ $nilai['mapel_nama'] }}</td>
                                                <td>{{ $nilai['kkm'] }}</td>
                                                <td>{{ $nilai['p1'] }}</td>
                                                <td>{{ $nilai['p2'] }}</td>
                                                <td>{{ $nilai['p3'] }}</td>
                                                <td>{{ $nilai['p4'] }}</td>
                                                <td>{{ $nilai['p5'] }}</td>
                                                <td>{{ $nilai['k1'] }}</td>
                                                <td>{{ $nilai['k2'] }}</td>
                                                <td>{{ $nilai['k3'] }}</td>
                                                <td>{{ $nilai['k4'] }}</td>
                                                <td>{{ $nilai['k5'] }}</td>
                                                <td>{{ $nilai['pts'] }}</td>
                                                <td>{{ $nilai['hpts'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="borderless" style="width: 100%;">
                                        <tbody>
                                            <tr class="text-italic">
                                                <td colspan="2">PTS =  Penilaian Tengah Semester (Khusus pada aspek Pengetahuan)</td>
                                            </tr>
                                            <tr class="text-italic">
                                                <td colspan="2">HPTS =  Hasil Penilaian Tengah Semester (Khusus pada aspek Pengetahuan)<br><br></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 70%">
                                                    Mengetahui:<br>
                                                    Orang Tua / Wali<br><br><br><br><br>
                                                    {{ $data['biodata']['ayah_nama'] }}
                                                </td>
                                                <td style="width: 30%">
                                                    {{ trim(strstr($data['biodata']['sekolah_kota'], " ")) . ", ". tanggal(substr(tanggal('now'), 0, 10)) }}<br>
                                                    Wali Kelas<br><br><br><br><br>
                                                    <b>{{ $data['biodata']['wali_kelas'] }}</b>
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