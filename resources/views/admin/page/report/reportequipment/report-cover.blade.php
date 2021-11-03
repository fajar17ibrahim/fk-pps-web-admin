
				@extends('admin.layouts.pdf')

                @section('content')
                <table class="borderless" style="width:100%">
                    <tbody class="text-center">
                        <tr>
                            <td class="text-center">
                                <br>
                                <img src="assets/images/ikhlas-beramal.jpg" width="120" heigth="120">
                                <h2 class="text-uppercase">Laporan Hasil Belajar</h2>
                                <h2 class="text-uppercase">{{ $santri[0]->school_name }}</h2>
                                <br>
                                <h2 class="text-uppercase">Tingkat {{ $santri[0]->class_level }}</h2>
                                <br><br>
                                <p class="text-uppercase text-size-16">NS : {{ $santri[0]->school_statistic_number }} - NPSN : {{ $santri[0]->school_npsn }}</p>
                                <br><br>
                                <img src="assets/images/logo-lembaga.jpg" width="180" heigth="180">
                                <br><br>
                                <h2>Nama Peserta Didik</h2>
                                <h1 id="vSantriName" class="text-uppercase border align-center width-50">{{ $santri[0]->santri_name }}</h1> 
                                <br><br>
                                <h2>NIS</h2>
                                <h2 class="border align-center width-50">{{ $santri[0]->santri_nism }}</h2> 
                                <br><br>
                                <h2>NISN</h2>
                                <h2 class="border align-center width-50">{{ $santri[0]->santri_nisn }}</h2>
                                <br><br>
                                <h2 class="text-uppercase">Kementrian Agama<br>Republik Indonesia</h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                @endsection

                @section('custom_js')
                <script>
                    // View Cover Data
                    $(function () {
                        alert('Tidak dapat menampilkan Data');
                        // const params = new URLSearchParams(window.location.search);
                        // var id = params.get('id');
                        // $.ajax({
                        //     url: "report-equipment/" + id,
                        //     type: "GET",
                        //     dataType: "JSON",
                        //     success: function(data) {
                        //         alert(data);
                        //         $('#vSantriName').text(": " + data[0].santri_name);
                        //         $('#vSantriNISM').text(": " + data.nism);
                        //         $('#vSantriNISN').text(": " + data.nisn);
                        //     },
                        //     error: function() {
                        //         alert('Tidak dapat menampilkan Data');
                        //     }
                        // });
                    });
                    
                </script>
                @endsection