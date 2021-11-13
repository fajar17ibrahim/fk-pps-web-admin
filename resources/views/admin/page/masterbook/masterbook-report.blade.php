
				@extends('admin.layouts.pdf')

                @section('content')
                    @foreach ($datas as $data)               
                    <table class="borderless" style="width:100%">
                        <tbody class="text-center text-uppercase text-bold">
                            <tr>
                                <td class="text-size-18">Data Nilai Siswa</td>
                            </tr>
                            <tr>
                                <td class="text-size-14">{{ $data['biodata']['pps_nama'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-size-14">Islamic School Tingkat Ulya</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="borderless" style="width:100%">
                        <tbody>
                            <tr>
                                <td style="width:20%">Nama</td>
                                <td>: {{ $data['biodata']['santri_nama'] }}</td>
                            </tr>
                            <tr>
                                <td>NISM</td>
                                <td>: {{ $data['biodata']['nism'] }}</td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>: {{ $data['biodata']['nisn'] }}</td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td>: {{ $data['biodata']['semester'] }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>: {{ $data['biodata']['kelas_nama'] }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Pelajaran</td>
                                <td>: {{ $data['biodata']['tahun_pelajaran'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="border text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th rowspan="2" style="width: 1%">No</th>
                                <th rowspan="2" style="width: 30%">Mata Pelajaran</th>
                                <th rowspan="2">KKM</th>
                                <th colspan="2">Pengetahuan</th>
                                <th colspan="2">Keterampilan</th>
                                <th colspan="2">Sikap Spiritual Dan Sosial</th>
                            </tr>
                            <tr>
                                <th>Angka</th>
                                <th>Predikat</th>
                                <th>Angka</th>
                                <th>Predikat</th>
                                <th>Dalam Mapel</th>
                                <th>Antar Mapel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['nilai'] as $nilai)
                            <tr>
                                <td>{{ $nilai['no'] }}</td>
                                <td class="text-left">{{ $nilai['mapel_nama'] }}</td>
                                <td>{{ $nilai['mapel_kkm'] }}</td>
                                <td>{{ $nilai['pas'] }}</td>
                                <td>{{ $nilai['pre_pengetahuan'] }}</td>
                                <td>{{ $nilai['hpa'] }}</td>
                                <td>{{ $nilai['pre_keterampilan'] }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="border" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 1%">No</th>
                                <th>Extrakurikuler</th>
                                <th class="text-center"style="width: 20%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['extra'] as $extra)
                            <tr>
                                <td>{{ $extra['no'] }}</td>
                                <td>{{ $extra['extra_nama'] }}</td>
                                <td class="text-center">{{ $extra['extra_nilai'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="border" style="width:100%">
                        <tbody>
                            <tr>
                                <td class="text-center" rowspan="3" style="width:40%">Ketidakhadiran</td>
                                <td style="width:30%">Sakit</td>
                                <td class="text-center">{{ $data['kehadiran']['sakit'] }}</td>
                            </tr>
                            <tr>
                                <td>Izin</td>
                                <td class="text-center">{{ $data['kehadiran']['izin'] }}</td>
                            </tr>
                            <tr>
                                <td>Tanpa Keterangan</td>
                                <td class="text-center">{{ $data['kehadiran']['alfa'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="new-page"></div>
                    @endforeach
                @endsection