
				@extends('admin.layouts.pdf')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="borderless align-center" style="width:80%;">
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><img src="assets/images/lambang-pancasila.jpg" width="80" heigh="80"><br><br></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="text-size-14 text-bold text-uppercase text-center">Surat Keterangan Lulus</div>
                                                <div class="text-size-14 text-bold text-uppercase text-center">Pendidikan Kesetaraan Pondok Pesantren Salafiyah</div>
                                                <div class="text-size-14 text-bold text-uppercase text-center">Tingkat Ulya</div>
                                                <div class="text-size-14 text-bold text-uppercase text-center">Tahun Pelajaran {{ $data['tahun_pelajaran'] }}</div>
                                                <div class="text-size-12 text-uppercase text-center">Nomor : ..........................</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="text-justify">
                                                    Yang bertandatangan dibawah ini Kepala Pendidikan Kesetaraan Pondok Pesantren Salafiyah Madani
                                                    Nomor Pokok Sekolah Nasional {{ $data['pps_npsn'] . " " . $data['pps_kota_prov'] }}, menerangkan bahwa :
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="borderless align-center" style="width:80%;">
                                    <tbody>
                                        <tr>
                                            <td style="width:35%">Nama Lengkap</td>
                                            <td>: {{ $data['santri_nama'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat, Tanggal Lahir</td>
                                            <td>: {{ $data['santri_ttl'] }}</td>
                                        </tr>   
                                        <tr>
                                            <td>Nama Orang Tua</td>
                                            <td>: {{ $data['ayah_nama'] }}</td>
                                        </tr> 
                                        <tr>
                                            <td>Nomor Induk Santri</td>
                                            <td>: {{ $data['santri_nism'] }}</td>
                                        </tr>  
                                        <tr>
                                            <td>Nomor Induk Santri Nasional</td>
                                            <td>: {{ $data['santri_nisn'] }}</td>
                                        </tr>  
                                        <tr>
                                            <td>Nomor Peserta Ujian Sekolah</td>
                                            <td>: {{ $data['nomor_ujian'] }}</td>
                                        </tr>  
                                        <!-- <tr>
                                            <td>Peminatan</td>
                                            <td>: </td>
                                        </tr>  -->
                                    </tbody>
                                </table>

                                <br>
                                <h2 class="text-bold text-center text-uppercase">{{ $data['santri_lulus'] }}</h2>
                                <br>
                                
                                <table class="borderless align-center" style="width:80%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-justify ">
                                                    dari Pendidikan Kesetaraan Pondok Pesantren Salafiyah Tingkat {{ $data['pps_level'] }} setara {{ $data['pps_setara_level'] }} setelah
                                                    memenuhi seluruh kriteriasesuai dengan perundang-undangan.
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="border align-center text-center" style="width:80%;">
                                    <thead>
                                        <tr>
                                            <th style="width:1%">No</th>
                                            <th style="width:60%">Mata Pelajaran</th>
                                            <th>Nilai Ujian Sekolah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['nilai'] as $nilai)
                                        <tr>
                                            <td>{{ $nilai['no'] }}</td>
                                            <td class="text-left">{{ $nilai['mapel_nama'] }}</td>
                                            <td>{{ $nilai['nus'] }}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="text-center text-bold">
                                            <td colspan="2"> Rata-Rata</td>
                                            <td>{{ $data['nilai_rata_rata'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="borderless align-center" style="width:80%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-justify ">
                                                    Suarat Keterangan ini dapat dipergunakan untuk keperluan Penerimaan Siswa/i atau Mahasiswa/i Baru atau 
                                                    keperluan lainnya.
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="borderless align-center" style="width:80%;">
                                    <tbody>
                                        <tr>
                                        <td style="width: 65%"></td>
                                            <td>
                                                {{ trim(strstr($data['pps_kota'], " ")) . ", ". tanggal(substr(tanggal('now'), 0, 10)) }}<br>
                                                Kepala<br><br><br><br><br><br>
                                                <b>{{ $data['pps_kepsek'] }}</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection