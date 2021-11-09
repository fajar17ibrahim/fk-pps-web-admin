
				@extends('admin.layouts.pdf')

                @section('content')
                <br><br>
                <table class="borderless" style="width:100%">
                    <tbody class="text-center">
                        <tr>
                            <td class="text-center">
                                <h2 class="text-uppercase">Keterangan Tentang Peserta Didik</h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br><br><br>
                <table class="borderless align-center" style="width:80%">
                    <tbody>
                        <tr>
                            <td style="width:1%;">1.</td>
                            <td style="width:39%;">Nama Peserta Didik (Lengkap)</td>
                            <td style="width:1px;">:</td>
                            <td style="width:60%;">{{ $santri[0]->santri_name }}</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_nism }}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>NISN</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_nisn }}</td>
                        </tr>
                        
                        <tr>
                            <td>4.</td>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_born_place .", ". tanggal($santri[0]->santri_born_date) }}</td>
                        </tr>
                        
                        <tr>
                            <td>5.</td>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_gender }}</td>
                        </tr>
                        
                        <tr>
                            <td>6.</td>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_religion }}</td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Status dalam Keluarga</td>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>Anak ke</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_child_of }}</td>
                        </tr>
                        <tr valign="top">
                            <td>9.</td>
                            <td>Alamat Peserta Didik</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_address . " RT/RW " . $santri[0]->santri_rt_rw . ", " . $santri[0]->santri_village . "" . $santri[0]->santri_district . ", " . $santri[0]->santri_city . ", " . $santri[0]->santri_province . " " . $santri[0]->santri_pos_code . ", " . $santri[0]->santri_country }}</td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>Nomor Telepon Rumah</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td>PPS Asal</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_last_school }}</td>
                        </tr>
                        <tr>
                            <td>12.</td>
                            <td>Diterima di PPS ini</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Dikelas</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_class_start }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Pada Tanggal</td>
                            <td>:</td>
                            <td>{{ tanggal($santri[0]->santri_class_start_date) }}</td>
                        </tr>
                        <tr>
                            <td>13.</td>
                            <td>Nama Orang Tua</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a. Ayah</td>
                            <td>:</td>
                            <td>{{ $santri[0]->father_name }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b. Ibu</td>
                            <td>:</td>
                            <td>{{ $santri[0]->mother_name }}</td>
                        </tr>
                        <tr valign="top">
                            <td>14.</td>
                            <td>Alamat Orang Tua</td>
                            <td>:</td>
                            <td>{{ $santri[0]->santri_address . " RT/RW " . $santri[0]->santri_rt_rw . ", " . $santri[0]->santri_village . "" . $santri[0]->santri_district . ", " . $santri[0]->santri_city . ", " . $santri[0]->santri_province . " " . $santri[0]->santri_pos_code . ", " . $santri[0]->santri_country }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Nomor Telepon Rumah</td>
                            <td>:</td>
                            <td>{{ $santri[0]->father_phone }}</td>
                        </tr>
                        <tr>
                            <td>15.</td>
                            <td>Pekerjaan Orang Tua</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a. Ayah</td>
                            <td>:</td>
                            <td>{{ $santri[0]->father_profession }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b. Ibu</td>
                            <td>:</td>
                            <td>{{ $santri[0]->mother_profession }}</td>
                        </tr>
                        <tr>
                            <td>16.</td>
                            <td>Nama Wali Peserta Didik</td>
                            <td>:</td>
                            <td>{{ $santri[0]->wali_name }}</td>
                        </tr>
                        <tr>
                            <td>17.</td>
                            <td>Alamat Wali Peserta Didik</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Nomor Telepon Rumah</td>
                            <td>:</td>
                            <td>{{ $santri[0]->wali_phone }}</td>
                        </tr>
                        <tr>
                            <td>18.</td>
                            <td>Pekerjaan Wali Peserta Didik</td>
                            <td>:</td>
                            <td>{{ $santri[0]->wali_profession }}</td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <table class="borderless align-center" style="width:80%;">
                    <tbody>
                        <tr >
                            <td class="text-right" rowspan="3" style="width:40%;"><img src="assets/images/avatars/{{ $santri[0]->santri_photo }}" alt="" class="border bg-white"  width="100" height="130"></td>
                            <!-- <td rowspan="4">Kepaa Ulya</td> -->
                            <td>
                                {{ $santri[0]->school_city . ", ". tanggal(substr(tanggal('now'), 0, 10)) }} <br>
                                Kepala {{ $santri[0]->class_level }}
                            </td>
                        </tr>
                        <tr>
                        <!-- <td>Kepala Ulya</td> -->
                            <td style="height:60px"></td>
                        </tr>
                        <tr>
                        <!-- <td>Kepala Ulya</td> -->
                            <td>{{ $santri[0]->ustadz_name }}</td>
                        </tr>
                    </tbody>
                </table>

                @endsection