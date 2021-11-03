
				@extends('admin.layouts.pdf')

                @section('content')
                <br><br>
                <table class="borderless" style="width:100%">
                    <tbody class="text-center">
                        <tr>
                            <td class="text-center">
                                <h2 class="text-uppercase">Laporan Hasil Belajar</h2>
                                <h2 class="text-uppercase">PPS MINHAAJUSHSHOOBIRIIN</h2>
                                <h2 class="text-uppercase">Tingkat {{ $santri[0]->class_level }}</h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br><br><br><br><br>
                <table class="borderless align-center" style="width:70%">
                    <tbody>
                        <tr>
                            <td style="width:30%;">Nama PPS</td>
                            <td style="width:70%;">: {{ $santri[0]->school_name }}</td>
                        </tr>
                        <tr>
                            <td>NPSN</td>
                            <td>: {{ $santri[0]->school_npsn }}</td>
                        </tr>
                        <tr>
                            <td>NSP</td>
                            <td>: {{ $santri[0]->school_statistic_number }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $santri[0]->school_address }}</td>
                        </tr>
                        <tr>
                            <td>Kelurahan / Desa</td>
                            <td>: {{ $santri[0]->school_village }}</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>: {{ $santri[0]->school_districts }}</td>
                        </tr>
                        <tr>
                            <td>Kabupaten / Kota</td>
                            <td>: {{ $santri[0]->school_city }}</td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>: {{ $santri[0]->school_province }}</td>
                        </tr>
                        <tr>
                            <td>website</td>
                            <td>: -</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: -</td>
                        </tr>
                    </tbody>
                </table>

                @endsection