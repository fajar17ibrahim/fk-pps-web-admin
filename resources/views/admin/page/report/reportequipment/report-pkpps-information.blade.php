
				@extends('admin.layouts.pdf')

                @section('content')
                <br><br>
                <table class="borderless" style="width:100%">
                    <tbody class="text-center text-uppercase text-bold">
                        <tr>
                            <td class="text-size-18">Laporan Hasil Belajar</td>
                        </tr>
                        <tr>
                            <td class="text-size-18">{{ $santri[0]->school_name }}</td>
                        </tr>
                        <tr>
                            <td class="text-size-18">Tingkat {{ $santri[0]->class_level }}</td>
                        </tr>
                    </tbody>
                </table>
                <br><br><br><br><br><br>
                <table class="borderless align-center" style="width:70%">
                    <tbody>
                        <tr>
                            <td style="width:29%;">Nama PPS</td>
                            <td style="width:1%;">:</td>
                            <td style="width:70%;">{{ $santri[0]->school_name }}</td>
                        </tr>
                        <tr>
                            <td>NPSN</td>
                            <td>:</td>
                            <td>{{ $santri[0]->school_npsn }}</td>
                        </tr>
                        <tr>
                            <td>NSP</td>
                            <td>:</td>
                            <td>{{ $santri[0]->school_statistic_number }}</td>
                        </tr>
                        <tr valign="top">
                            <td>Alamat
                            <td>:</td>
                            </td>
                            <td>{{ $santri[0]->school_address }}</td>
                        </tr>
                        <tr>
                            <td>Kelurahan / Desa</td>
                            <td>:</td>
                            <td>{{ $santri[0]->school_village }}</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td>{{ $santri[0]->school_districts }}</td>
                        </tr>
                        <tr>
                            <td>Kabupaten / Kota</td>
                            <td>:</td>
                            <td>{{ $santri[0]->school_city }}</td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td>{{ $santri[0]->school_province }}</td>
                        </tr>
                        <tr>
                            <td>website</td>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $santri[0]->school_email }}</td>
                        </tr>
                    </tbody>
                </table>

                @endsection