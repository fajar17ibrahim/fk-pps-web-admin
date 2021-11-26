
				@extends('admin.layouts.dashboard')

                @section('content')
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    
                    <div class="container">
                        <div class="main-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img id="photo" src="assets/images/avatars/avatar-santri.jpg" alt="" class="p-1 border bg-white mt-4"  width="120" height="140">
                                                <div class="mt-4">
                                                    <h5 id="vSantriNameCard">-</h5>
                                                    <p class="text-secondary mb-1">Santri</p>
                                                    <p id="vSchool" class="text-secondary text-uppercase mb-1">-</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body"><h4 class="mb-0 text-uppercase text-center mt-4">Informasi Data Santri</h4>
                                            <div class="mt-4">
                                                <h5 class="text-success">Data Santri</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>      
                                                        <tr>
                                                            <td style="width:30%">Nama Santri</td>
                                                            <td style="width:70%" id="vSantriName">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NISM</td>
                                                            <td id="vSantriNISM">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NISN</td>
                                                            <td id="vSantriNISN">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No. KIP</td>
                                                            <td id="vSantriNoKIP">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No. PKH</td>
                                                            <td id="vSantriNoKPH">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIK</td>
                                                            <td id="vSantriNIK">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tempat Tanggal Lahir</td>
                                                            <td id="vSantriBornPlace">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td id="vSantriGender">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Agama</td>
                                                            <td id="vSantriReligion">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hobi</td>
                                                            <td id="vSantriHobby">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cita - Cita</td>
                                                            <td id="vSantriGoals">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kewarganegaraan</td>
                                                            <td id="vSantriState">: WNI</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kebutuhan Khusus</td>
                                                            <td id="vSantri">: Tidak Ada</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status Rumah</td>
                                                            <td id="vSantriHomeStatus">: Asrama milik lembaga</td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5 class="text-success">Data Ayah Kandung</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">No. KK</td>
                                                            <td id="vSantriNoKK" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">NIK Ayah</td>
                                                            <td id="vAyahNIK" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Nama Ayah</td>
                                                            <td id="vAyahName" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pekerjaan Ayah</td>
                                                            <td id="vAyahProfesion" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pendidikan Ayah</td>
                                                            <td id="vAyahEducation" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Telepon Ayah</td>
                                                            <td id="vAyahPhone" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Rata - Rata Penghasilan</td>
                                                            <td id="vAyahSalary" style="width:70%">: -</td>
                                                        </tr>   
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5 class="text-success">Data Ibu Kandung</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">NIK Ibu</td>
                                                            <td id="vIbuNIK" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Nama Ibu</td>
                                                            <td id="vIbuName" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pekerjaan Ibu</td>
                                                            <td id="vIbuProfesion" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pendidikan Ibu</td>
                                                            <td id="vIbuEducation" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Telepon Ibu</td>
                                                            <td id="vIbuPhone" style="width:70%">: -</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5 class="text-success">Data Wali</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">No. KK Wali</td>
                                                            <td id="vWaliNoKK" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">NIK Wali</td>
                                                            <td id="vWaliNIK" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Nama Wali</td>
                                                            <td id="vWaliName" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pekerjaan Wali</td>
                                                            <td id="vWaliProfesion" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Pendidikan Wali</td>
                                                            <td id="vWaliEducation" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Rata - Rata Penghasilan</td>
                                                            <td id="vWaliSalary" style="width:70%">: -</td>
                                                        </tr>   
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5 class="text-success">Data Alamat</h5>
                                                <hr>
                                                <table id="table-attendance"  class="table-borderless" style="width:100%; line-height:2">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:30%">Alamat Rumah</td>
                                                            <td id="vSantriAddress" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">RT / RW</td>
                                                            <td id="vSantriRTRW" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Provinsi</td>
                                                            <td id="vSantriProvince" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Kabupaten/Kota</td>
                                                            <td id="vSantriCity" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Kecamatan</td>
                                                            <td id="vSantriDistrict" style="width:70%">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%">Kode Pos</td>
                                                            <td id="vSantriPosCode" style="width:70%">: -</td>
                                                        </tr>   
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection

                @section('custom_js')
                <script>
                    // View Santri
                    $(function () {
                        const params = new URLSearchParams(window.location.search);
                        var id = params.get('id');
                        $.ajax({
                            url: "master-santri/" + id,
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                console.log('images/' + data.photo)
                                $('#photo').attr('src', 'images/' + data.photo);
                                $('#vSchool').text(data.school);
                                $('#vSantriNameCard').text(data.name);
                                $('#vSantriName').text(": " + data.name);
                                $('#vSantriNISM').text(": " + data.nism);
                                $('#vSantriNISN').text(": " + data.nisn);
                                $('#vSantriNIK').text(": " + data.name);
                                $('#vSantriBornPlace').text(": " + data.tempat_lahir + ", " + data.tanggal_lahir);
                                $('#vSantriGender').text(": " + data.gender);
                                $('#vSantriHobby').text(": " + data.hobi);
                                $('#vSantriGoals').text(": " + data.cita_cita);
                                $('#vSantriStatusHome').text(": " + data.status_rumah);
                                $('#vSantriNoKK').text(": " + data.no_kk);
                                $('#vAyahNIK').text(": " + data.nik_ayah);
                                $('#vAyahName').text(": " + data.nama_ayah);
                                $('#vAyahProfesion').text(": " + data.pekerjaan_ayah);
                                $('#vAyahEducation').text(": " + data.pendidikan_ayah);
                                $('#vAyahPhone').text(": " + data.telepon_ayah);
                                $('#vAyahSalary').text(": " + data.gaji_ayah);
                                $('#vIbuNIK').text(": " + data.nik_ibu);
                                $('#vIbuName').text(": " + data.nama_ibu);
                                $('#vIbuProfesion').text(": " + data.pekerjaan_ibu);
                                $('#vIbuEducation').text(": " + data.pendidikan_ibu);
                                $('#vIbuPhone').text(": " + data.telepon_ibu);
                                $('#vIbuSalary').text(": " + data.gaji_ibu);
                                $('#vWaliNoKK').text(": " + data.no_kk_wali);
                                $('#vWaliNIK').text(": " + data.nik_wali);
                                $('#vWaliName').text(": " + data.nama_wali);
                                $('#vWaliProfesion').text(": " + data.pekerjaan_wali);
                                $('#vWaliEducation').text(": " + data.pendidikan_wali);
                                $('#vWaliPhone').text(": " + data.telepon_wali);
                                $('#vWaliSalary').text(": " + data.gaji_wali);
                                $('#vSantriAddress').text(": " + data.alamat);
                                $('#vSantriRTRW').text(": " + data.rt_rw);
                                $('#vSantriDistrict').text(": " + data.kecamatan);
                                $('#vSantriCity').text(": " + data.kab_kota);
                                $('#vSantriProvince').text(": " + data.provinsi);
                                $('#vSantriPosCode').text(": " + data.kode_pos);
                                $('#vSantriCountry').text(": " + data.negara);
                            },
                            error: function() {
                                alert('Tidak dapat menampilkan Data');
                            }
                        });
                    });
                    
                </script>
                @endsection