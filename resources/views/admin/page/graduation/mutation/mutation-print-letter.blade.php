
				@extends('admin.layouts.pdf')

                @section('content')
                <div class="col-lg-12">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="border-bottom-double align-center" style="width:80%;">
                                    <tbody>
                                        <tr>
                                            <td style="width:20%"><img src="images/{{ $mutation['sekolah_asal_logo'] }}" width="80" heigh="80"></td>
                                            <td style="width:80%"class="text-center">
                                                <div class="text-uppercase text-bold text-size-16">{{ $mutation['sekolah_asal_nama'] }}</div>
                                                <div class="text-uppercase text-bold text-size-14">Kecamatan {{ $mutation['sekolah_asal_kec'] . " " . $mutation['sekolah_asal_kab_kota'] }}</div>
                                                <div class="text-size-12">NPSN {{ $mutation['sekolah_asal_npsn'] . " " . $mutation['sekolah_asal_alamat'] }}, Kec. {{ $mutation['sekolah_asal_kec'] . " " . $mutation['sekolah_asal_kab_kota'] . " " . $mutation['sekolah_asal_provinsi'] . " " . $mutation['sekolah_asal_pos'] }}</div>
                                                <div class="text-size-12">Email : {{ $mutation['sekolah_asal_email'] }}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <br><br>
                                <div class="text-center text-bold text-uppercase text-size-16">Surat Keterangan Mutasi Peserta Didik</div>
                                <div class="text-center text-size-12">Nomor : .........................</div>
                                <br>

                                <table class="borderless align-center" style="width:80%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-justify ">
                                                    Yang bertandatangan dibawah ini Kepala {{ $mutation['sekolah_asal_level'] . " " . $mutation['sekolah_asal_nama'] }} dengan ini menyatakan bahwa :
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="borderless align-center" style="width:80%;">
                                    <tbody> 
                                        <tr>
                                            <td>NISN</td>
                                            <td>: {{ $mutation['santri_nisn'] }}</td>
                                        </tr> 
                                        <tr>
                                            <td style="width:35%">Nama Lengkap</td>
                                            <td>: {{ $mutation['santri_nama'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>: {{ $mutation['santri_gender'] }}</td>
                                        </tr> 
                                        
                                        <tr>
                                            <td>Tempat, Tanggal Lahir</td>
                                            <td>: {{ $mutation['santri_ttl'] }}</td>
                                        </tr>   
                                        <tr>
                                            <td>Kelas</td>
                                            <td>: {{ $mutation['santri_kelas'] }}</td>
                                        </tr> 
                                        <tr>
                                            <td>Nama Ibu Kandung</td>
                                            <td>: {{ $mutation['santri_ibu_kandung'] }}</td>
                                        </tr>  

                                        <tr>
                                            <td colspan="2"><br>Sesuai dengan permohonan pindah oleh orang tua / wali murid : <br><br></td>
                                        </tr>   
                                        <tr>
                                            <td>Nama Orang Tua / Wali</td>
                                            <td>: {{ $mutation['ayah_nama'] }}</td>
                                        </tr> 
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>: {{ $mutation['ayah_pekerjaan'] }}</td>
                                        </tr>   
                                    </tbody>
                                </table>

                                <table class="borderless align-center" style="width:80%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-justify ">
                                                    Bahwa orang tua / wali santri tersebut diatas telah mengajukan permohonan pindah dari
                                                    peserta didik tersebut ke {{ $mutation['sekolah_dest_nama'] . " " . $mutation['sekolah_dest_alamat'] . " " . $mutation['sekolah_dest_kec'] . " " . $mutation['sekolah_dest_kab_kota'] . " " . $mutation['sekolah_dest_provinsi'] }}. Bersama dengan ini kami sertakan Surat Keterangan 
                                                    Pindah / Keluar dari emis.
                                                </p>
                                                <p class="text-justify ">
                                                    Demikian kami buat surat keterangan ini dengan sebenar-benarnya untuk dapat
                                                    dipergunakan sebagaimana mestinya.
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
                                                {{ trim(strstr($mutation['sekolah_asal_kab_kota'], " ")) . ", ". tanggal(substr(tanggal('now'), 0, 10)) }}<br>
                                                Kepala<br><br><br><br><br><br>
                                                <b>{{ $mutation['sekolah_asal_kepsek'] }}</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection