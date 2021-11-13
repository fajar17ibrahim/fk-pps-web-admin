
				@extends('admin.layouts.pdf')

                @section('content')
                <table class="borderless" style="width:100%">
                    <tbody class="text-center text-uppercase text-bold">
                        <tr>
                            <td class="text-size-18">Lembar Buku Induk Registrasi</td>
                        </tr>
                        <tr>
                            <td class="text-size-14">{{ $biodata['pps_nama'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-size-14">Islamic School Tingkat {{ $biodata['pps_tingkat'] }}</td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <table class="borderless align-center" style="width:80%">
                    <tbody>
                        <tr>
                            <td rowspan="11" class="table-text-top" style="width:1%">A.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Peserta Didik</td>
                        </tr>
                        <tr>
                            <td style="width:0%;">1.</td>
                            <td style="width:35%;">Nama Lengkap</td>
                            <td style="width:40%;">: {{ $biodata['santri_nama'] }}</td>
                            <td style="width:25%;" rowspan="11"  class="table-text-top"><img src="assets/images/avatars/avatar-santri.jpg" alt="" class="bg-white"  width="100" height="120"></td>
                        </tr>   
                        <tr>
                            <td style="width:1%;">2.</td>
                            <td>NISM</td>
                            <td>: {{ $biodata['santri_nism'] }}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>NISN</td>
                            <td>: {{ $biodata['santri_nisn'] }}</td>
                        </tr>

                        <tr>
                            <td>4.</td>
                            <td>Jenis Kelamin</td>
                            <td>: {{ $biodata['santri_jk'] }}</td>
                        </tr>
                        
                        <tr>
                            <td>5.</td>
                            <td>Tempat Lahir</td>
                            <td>: {{ $biodata['santri_tl'] }}</td>
                        </tr>
                        
                        <tr>
                            <td>6.</td>
                            <td>Tanggal Lahir</td>
                            <td>: {{ $biodata['santri_tgll'] }}</td>
                        </tr>

                        <tr>
                            <td>7.</td>
                            <td>Anak ke</td>
                            <td>:  {{ $biodata['santri_anak_ke'] }}</td>
                        </tr>

                        <tr>
                            <td>8.</td>
                            <td>Jumlah Saudara Kandung</td>
                            <td>: {{ $biodata['santri_jml_sdr_kandung'] }}</td>
                        </tr>
                        
                        <tr>
                            <td>9.</td>
                            <td>Jumlah Saudara Tiri</td>
                            <td>: {{ $biodata['santri_jml_sdr_tiri'] }}</td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>Anak Yatim / Piatu / Yatim Piatu</td>
                            <td>: {{ $biodata['santri_yatim_piatu'] }}</td>
                        </tr>

                        <tr>
                            <td rowspan="5" class="table-text-top" style="width:1%">B.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Kesehatan</td>
                        </tr>

                        <tr>
                            <td style="width:0%;">11.</td>
                            <td style="width:25%;">Golongan Darah</td>
                            <td colspan="2">: {{ $biodata['santri_golongan_darah'] }}</td>
                        </tr>
                        <tr>
                            <td style="width:1%;">12.</td>
                            <td>Penyakit yang pernah diderita</td>
                            <td colspan="2">: {{ $biodata['santri_riwayat_penyakit'] }}</td>
                        </tr>
                        <tr>
                            <td>13.</td>
                            <td>Tinggi Badan</td>
                            <td colspan="2">: {{ $biodata['santri_tinggi'] }}</td>
                        </tr>

                        <tr>
                            <td>14.</td>
                            <td>Berat Badan</td>
                            <td colspan="2">: {{ $biodata['santri_berat'] }}</td>
                        </tr>

                        <tr>
                            <td rowspan="10" class="table-text-top" style="width:1%">C.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Pendidikan</td>
                        </tr>

                        <tr>
                            <td style="width:0%;">15.</td>
                            <td style="width:25%;">Pendidikan Sebelumnya</td>
                            <td colspan="2">:{{ $biodata['santri_pend_sebelum'] }}</td>
                        </tr>

                        <tr>
                            <td style="width:1%;">15.A.</td>
                            <td>Sekolah Asal</td>
                            <td colspan="2">: {{ $biodata['santri_sekolah_asal'] }}</td>
                        </tr>

                        <tr>
                            <td>15.B.</td>
                            <td>Nomor Ijazah</td>
                            <td colspan="2">: {{ $biodata['santri_ijazah_no_asal'] }}</td>
                        </tr>

                        <tr>
                            <td>15.C</td>
                            <td>Tanggal Ijazah</td>
                            <td colspan="2">: {{ $biodata['santri_ijazah_tgl_asal'] }}</td>
                        </tr>

                        <tr>
                            <td>16.</td>
                            <td>Pindahan</td>
                            <td colspan="2">: {{ $biodata['santri_pindahan'] }}</td>
                        </tr>

                        <tr>
                            <td>16.A.</td>
                            <td>Alsan Pindah</td>
                            <td td colspan="2">: {{ $biodata['santri_alasan_pindah'] }}</td>
                        </tr>

                        <tr>
                            <td>17.</td>
                            <td>Diterima di Sekolah ini</td>
                            <td  td colspan="2"></td>
                        </tr>

                        <tr>
                            <td>17.A.</td>
                            <td>Dikelas</td>
                            <td  td colspan="2">: {{ $biodata['santri_diterima_di_kelas'] }}</td>
                        </tr>

                        <tr>
                            <td>17.B.</td>
                            <td>Pada Tanggal</td>
                            <td colspan="2">: {{ $biodata['santri_diterima_tanggal'] }}</td>
                        </tr>

                        <tr>
                            <td rowspan="19" class="table-text-top" style="width:1%">D.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Kesehatan</td>
                        </tr>

                        <tr>
                            <td>18.</td>
                            <td>Ayah</td>
                            <td colspan="2">: {{ $biodata['ayah_nama'] }}</td>
                        </tr>

                        <tr>
                            <td>19.</td>
                            <td>NIK Ayah</td>
                            <td colspan="2">: {{ $biodata['ayah_nik'] }}<td>
                        </tr>

                        <tr>
                            <td>20.</td>
                            <td>Pendidikan Terakhir Ayah</td>
                            <td colspan="2">: {{ $biodata['ayah_pendidikan'] }}</td>
                        </tr>

                        <tr>
                            <td>21.</td>
                            <td>Kerja Ayah</td>
                            <td colspan="2">: {{ $biodata['ayah_kerja'] }}</td>
                        </tr>

                        <tr>
                            <td>22.</td>
                            <td>Penghasilan Ayah</td>
                            <td colspan="2">: {{ $biodata['ayah_penghasilan'] }}</td>
                        </tr>
                        
                        <tr>
                            <td>24.</td>
                            <td>Alamat Ayah</td>
                            <td colspan="2">: {{ $biodata['ayah_alamat'] }}</td>
                        </tr>
                        
                        <tr>
                            <td>25.</td>
                            <td>Ibu</td>
                            <td colspan="2">: {{ $biodata['ibu_nama'] }}</td>
                        </tr>

                        <tr>
                            <td>26.</td>
                            <td>NIK Ibu</td>
                            <td colspan="2">: {{ $biodata['ibu_nik'] }}</td>
                        </tr>

                        <tr>
                            <td>27.</td>
                            <td>Pendidikan Terakhir Ibu</td>
                            <td colspan="2">: {{ $biodata['ibu_pendidikan'] }}</td>
                        </tr>

                        <tr>
                            <td>28.</td>
                            <td>Kerja Ibu</td>
                            <td colspan="2">: {{ $biodata['ibu_kerja'] }}</td>
                        </tr>

                        <tr>
                            <td>29.</td>
                            <td>Penghasilan Ibu</td>
                            <td colspan="2">: {{ $biodata['ibu_penghasilan'] }}</td>
                        </tr>

                        <tr>
                            <td>30.</td>
                            <td>Alamat Ibu</td>
                            <td colspan="2">: {{ $biodata['ibu_alamat'] }}</td>
                        </tr>

                        <tr>
                            <td>31.</td>
                            <td>Wali</td>
                            <td colspan="2">: {{ $biodata['wali_nama'] }}</td>
                        </tr>

                        <tr>
                            <td>32.</td>
                            <td>NIK Wali</td>
                            <td colspan="2">: {{ $biodata['wali_nik'] }}</td>
                        </tr>

                        <tr>
                            <td>33.</td>
                            <td>Pendidikan Terakhir Wali</td>
                            <td colspan="2">: {{ $biodata['wali_pendidikan'] }}</td>
                        </tr>

                        <tr>
                            <td>34.</td>
                            <td>Kerja Wali</td>
                            <td colspan="2">: {{ $biodata['wali_kerja'] }}</td>
                        </tr>

                        <tr>
                            <td>35.</td>
                            <td>Penghasilan Wali</td>
                            <td colspan="2">: {{ $biodata['wali_kerja'] }}</td>
                        </tr>
                        
                        <tr>
                            <td>36.</td>
                            <td>Alamat Wali</td>
                            <td colspan="2">: {{ $biodata['wali_alamat'] }}</td>
                        </tr>

                        <tr>
                            <td rowspan="6" class="table-text-top" style="width:1%">E.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Perkembangan Peserta</td>
                        </tr>

                        <tr>
                            <td style="width:0%;">37.</td>
                            <td style="width:25%;">Lulus / Tidak Lulus</td>
                            <td colspan="2">: {{ $biodata['santri_lulus'] }}</td>
                        </tr>

                        <tr>
                            <td style="width:1%;">38.</td>
                            <td>Pindah</td>
                            <td colspan="2">: {{ $biodata['santri_pindah'] }}</td>
                        </tr>
                        
                        <tr>
                            <td>39.</td>
                            <td>Tanggal</td>
                            <td colspan="2">: {{ $biodata['santri_lulus_tgl'] }}</td>
                        </tr>

                        <tr>
                            <td>40.</td>
                            <td>Nomor Ijazah</td>
                            <td colspan="2">: {{ $biodata['santri_ijazah_no'] }}</td>
                        </tr>
                        
                        <tr>
                            <td>41.</td>
                            <td>Melanjutkan Ke</td>
                            <td colspan="2">: {{ $biodata['santri_malanjutkan_ke'] }}</td>
                        </tr>
                    </tbody>
                </table>

                @endsection