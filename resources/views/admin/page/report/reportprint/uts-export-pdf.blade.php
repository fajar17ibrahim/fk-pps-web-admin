
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
                                                <td style="width:40%">: {{ $reportPrint[0]->school_name }}</td>
                                                <td style="width:15%">Kelas</td>
                                                <td style="width:20%">: {{ $reportPrint[0]->class_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>: {{ $reportPrint[0]->school_address }}</td>
                                                <td>Semester</td>
                                                <td>: 1 (Satu)</td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>: {{ $reportPrint[0]->santri_name }}</td>
                                                <td>Tahun Pelajaran</td>
                                                <td>: 2018-2019</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Induk</td>
                                                <td>: {{ $reportPrint[0]->santri_nism }}</td>
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
                                            <tr>
                                                <td>1</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td class="text-left">Bahasa Arab</td>
                                                <td>80</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="borderless" style="width: 100%;">
                                        <tbody>
                                            <tr class="text-italic">
                                                <td colspan="2">HPTS =  Hasil Penilaian Tengah Semester (Khusus pada aspek Pengetahuan)<br><br></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 70%">
                                                    Mengetahui:<br>
                                                    Orang Tua / Wali<br><br><br><br><br>
                                                    {{ $reportPrint[0]->father_name }}
                                                </td>
                                                <td style="width: 30%">
                                                    Jakarta Timur, 18 September 2021<br>
                                                    Wali Kelas<br><br><br><br><br>
                                                    <b>RULI</b>
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