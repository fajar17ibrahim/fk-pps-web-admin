
				@extends('admin.layouts.pdf')

                @section('content')
                <br><br><br><br><br><br><br><br><br>
                <table class="borderless" style="width:100%;">
                    <tbody class="text-center">
                        <tr>
                            <td class="text-center">
                                <br>
                                <img src="assets/images/logo-lembaga.jpg" width="250" heigth="250">
                                <h1 class="text-uppercase">Buku Induk Santri</h1>
                                <h2 class="text-uppercase">{{ $masterBook[0]->school_name }}</h2>
                                <br><br><br><br>
                                <h2 class="text-uppercase">Nomor</h2>
                                <h2 class="text-uppercase">510031750032180012 - 510031750032180021</h2>
                                <h2 class="text-uppercase">510031750032180009 - 510031750032180116</h2>
                                <h2 class="text-uppercase">510031750032180017</h2>
                                <br><br><br><br><br><br><br><br>
                                <p class="text-uppercase text-size-14">
                                    {{ $masterBook[0]->school_address . ", " . $masterBook[0]->school_village }}<br>
                                    {{ $masterBook[0]->school_city . " " . $masterBook[0]->school_pos_code }}<br>
                                    {{ $masterBook[0]->school_phone }}<br>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @endsection