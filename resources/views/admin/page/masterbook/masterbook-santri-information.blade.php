
				@extends('admin.layouts.pdf')

                @section('content')
                <table class="borderless" style="width:100%">
                    <tbody class="text-center text-uppercase text-bold">
                        <tr>
                            <td class="text-size-18">Lembar Buku Induk Registrasi</td>
                        </tr>
                        <tr>
                            <td class="text-size-14">{{ $masterBook[0]->school_name }}</td>
                        </tr>
                        <tr>
                            <td class="text-size-14">Islamic School Tingkat {{ $masterBook[0]->class_level }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="borderless align-center" style="width:80%">
                    <tbody>
                        <tr>
                            <td rowspan="11" class="table-text-top" style="width:1%">A.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Peserta Didik</td>
                        </tr>
                        <tr>
                            <td style="width:0%;">1.</td>
                            <td style="width:35%;">Nama Lengkap</td>
                            <td style="width:40%;">: {{ $masterBook[0]->santri_name }}</td>
                            <td style="width:25%;" rowspan="11"  class="table-text-top"><img src="assets/images/avatars/avatar-santri.jpg" alt="" class="bg-white"  width="100" height="120"></td>
                        </tr>   
                        <tr>
                            <td style="width:1%;">2.</td>
                            <td>NIS</td>
                            <td>: {{ $masterBook[0]->santri_nism }}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>NISN</td>
                            <td>: {{ $masterBook[0]->santri_nisn }}</td>
                        </tr>

                        <tr>
                            <td>4.</td>
                            <td>Jenis Kelamin</td>
                            <td>: {{ $masterBook[0]->santri_gender }}</td>
                        </tr>
                        
                        <tr>
                            <td>5.</td>
                            <td>Tempat Lahir</td>
                            <td>: {{ $masterBook[0]->santri_born_place }}</td>
                        </tr>
                        
                        <tr>
                            <td>6.</td>
                            <td>Tanggal Lahir</td>
                            <td>: {{ tanggal($masterBook[0]->santri_born_date) }}</td>
                        </tr>

                        <tr>
                            <td>7.</td>
                            <td>Anak ke</td>
                            <td>: 2</td>
                        </tr>

                        <tr>
                            <td>8.</td>
                            <td>Jumlah Saudara Kandung</td>
                            <td>: 2</td>
                        </tr>
                        
                        <tr>
                            <td>9.</td>
                            <td>Jumlah Saudara Tiri</td>
                            <td>: -</td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>Anak Yatim / Piatu / Yatim Piatu</td>
                            <td>:</td>
                        </tr>

                        <tr>
                            <td rowspan="5" class="table-text-top" style="width:1%">B.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Kesehatan</td>
                        </tr>

                        <tr>
                            <td style="width:0%;">11.</td>
                            <td style="width:25%;">Golongan Darah</td>
                            <td colspan="2">: -</td>
                        </tr>
                        <tr>
                            <td style="width:1%;">12.</td>
                            <td>Penyakit yang pernah diderita</td>
                            <td colspan="2">: -</td>
                        </tr>
                        <tr>
                            <td>13.</td>
                            <td>Tinggi Badan</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>14.</td>
                            <td>Berat Badan</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td rowspan="10" class="table-text-top" style="width:1%">C.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Pendidikan</td>
                        </tr>

                        <tr>
                            <td style="width:0%;">15.</td>
                            <td style="width:25%;">Pendidikan Sebelumnya</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td style="width:1%;">15.A.</td>
                            <td>Sekolah Asal</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>15.B.</td>
                            <td>Nomor Ijazah</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>15.C</td>
                            <td>Tanggal Ijazah</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>16.</td>
                            <td>Pindahan</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>16.A.</td>
                            <td>Alsan Pindah</td>
                            <td td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>17.</td>
                            <td>Diterima di Sekolah ini</td>
                            <td  td colspan="2"></td>
                        </tr>

                        <tr>
                            <td>17.A.</td>
                            <td>Dikelas</td>
                            <td  td colspan="2">: X</td>
                        </tr>

                        <tr>
                            <td>17.B.</td>
                            <td>Pada Tanggal</td>
                            <td colspan="2">: 15 Juli 2018</td>
                        </tr>

                        <tr>
                            <td rowspan="22" class="table-text-top" style="width:1%">D.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Kesehatan</td>
                        </tr>

                        <tr>
                            <td>18.</td>
                            <td>Ayah</td>
                            <td colspan="2">: {{ $masterBook[0]->father_name }}</td>
                        </tr>

                        <tr>
                            <td>19.</td>
                            <td>NIK Ayah</td>
                            <td colspan="2">: {{ $masterBook[0]->father_nik }}</td>
                        </tr>

                        <tr>
                            <td>20.</td>
                            <td>Pendidikan Terakhir Ayah</td>
                            <td colspan="2">: {{ $masterBook[0]->father_education }}</td>
                        </tr>

                        <tr>
                            <td>21.</td>
                            <td>Kerja Ayah</td>
                            <td colspan="2">: {{ $masterBook[0]->father_position }}</td>
                        </tr>

                        <tr>
                            <td>22.</td>
                            <td>Penghasilan Ayah</td>
                            <td colspan="2">: {{ $masterBook[0]->father_salary }}</td>
                        </tr>
                        
                        <tr>
                            <td>23.</td>
                            <td>Penghasilan Ayah</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>24.</td>
                            <td>Alamat Ayah</td>
                            <td colspan="2">: -</td>
                        </tr>
                        
                        <tr>
                            <td>25.</td>
                            <td>Ibu</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>26.</td>
                            <td>NIK Ibu</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>27.</td>
                            <td>Pendidikan Terakhir Ibu</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>28.</td>
                            <td>Kerja Ibu</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>29.</td>
                            <td>Penghasilan Ibu</td>
                            <td colspan="2">: -</td>
                        </tr>
                        
                        <tr>
                            <td>30.</td>
                            <td>Penghasilan Ibu</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>31.</td>
                            <td>Alamat Ibu</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>32.</td>
                            <td>Wali</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>33.</td>
                            <td>NIK Wali</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>34.</td>
                            <td>Pendidikan Terakhir Wali</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>35.</td>
                            <td>Kerja Wali</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>36.</td>
                            <td>Penghasilan Wali</td>
                            <td colspan="2">: -</td>
                        </tr>
                        
                        <tr>
                            <td>37.</td>
                            <td>Penghasilan Wali</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>38.</td>
                            <td>Alamat Wali</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td rowspan="6" class="table-text-top" style="width:1%">E.</td>
                            <td colspan="4" class="text-uppercase">Keterangan Perkembangan Peserta</td>
                        </tr>

                        <tr>
                            <td style="width:0%;">39.</td>
                            <td style="width:25%;">Lulus / Tidak Lulus</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td style="width:1%;">40.</td>
                            <td>Pindah</td>
                            <td colspan="2">: -</td>
                        </tr>
                        
                        <tr>
                            <td>41.</td>
                            <td>Tanggal</td>
                            <td colspan="2">: -</td>
                        </tr>

                        <tr>
                            <td>42.</td>
                            <td>Nomor Ijazah</td>
                            <td colspan="2">: -</td>
                        </tr>
                        
                        <tr>
                            <td>43.</td>
                            <td>Melanjutkan Ke</td>
                            <td colspan="2">: -</td>
                        </tr>
                    </tbody>
                </table>

                @endsection