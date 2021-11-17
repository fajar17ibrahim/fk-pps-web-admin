
				@extends('admin.layouts.pdf')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <table id="table-attendance"  class="borderless" style="width:100%">
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
                                    <table id="table-attendance"  class="borderless" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="width:15%">Nama PKPPS</td>
                                                <td style="width:40%">: {{ $reportPrint->school_name }}</td>
                                                <td style="width:15%">Kelas</td>
                                                <td style="width:20%">: {{ $reportPrint->class_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>: {{ $reportPrint->school_address }}</td>
                                                <td>Semester</td>
                                                <td>: {{ $reportPrint->semester_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>: {{ $reportPrint->santri_name }}</td>
                                                <td>Tahun Pelajaran</td>
                                                <td>: {{ $reportPrint->tahun_pelajaran_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Induk</td>
                                                <td>: {{ $reportPrint->santri_nism }}</td>
                                                <td></td>
                                                <td></td>
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
                                            @php $no = 1; @endphp
                                            @foreach ($reportValues as $reportValue)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td class="text-left">{{ $reportValue->mapel_name }}</td>
                                                <td>{{ $reportValue->report_kkm }}</td>
                                                <td>{{ $reportValue->p1 }}</td>
                                                <td>{{ $reportValue->p2 }}</td>
                                                <td>{{ $reportValue->p3 }}</td>
                                                <td>{{ $reportValue->p4 }}</td>
                                                <td>{{ $reportValue->p5 }}</td>
                                                <td>{{ $reportValue->k1 }}</td>
                                                <td>{{ $reportValue->k2 }}</td>
                                                <td>{{ $reportValue->k3 }}</td>
                                                <td>{{ $reportValue->k4 }}</td>
                                                <td>{{ $reportValue->k5 }}</td>
                                                <td>{{ $reportValue->pts }}</td>
                                                <td>{{ $reportValue->pts }}</td>
                                            </tr>
                                            @php $no++ @endphp
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
                                                    {{ $reportPrint->father_name }}
                                                </td>
                                                <td style="width: 30%">
                                                {{ trim(strstr($reportPrint->school_city, " ")) . ", ". tanggal(substr(tanggal('now'), 0, 10)) }}<br>
                                                    Wali Kelas<br><br><br><br><br>
                                                    <b>{{ $reportPrint->ustadz_name }}</b>
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