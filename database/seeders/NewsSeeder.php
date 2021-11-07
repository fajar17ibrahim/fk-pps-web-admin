<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $news = new News;
        $news->news_title = 'Dana BOS 2021 Tahap 2';
        $news->news_post_date = '2021-05-22';
        $news->news_post_time = '08:30';
        $news->news_description = 'Menteri Pendidikan, Kebudayaan, Riset dan Teknologi (Mendikbud Ristek) Nadiem Makarim menyebut pemerintah telah mengalokasikan Dana Bantuan Operasional Sekolah (BOS) sebesar Rp 52,5 triliun untuk 216.662 satuan pendidikan SD, SMP, SMA, SMK serta SLB di tahun 2021.';
        $news->news_photo = '';
        $news->news_poster = '351315000000000';
        $news->save();

        $news = new News;
        $news->news_title = 'Juknis Ujian Sekolah PKPPS Pendidikan Kesetaraan Pondok Pesantren';
        $news->news_post_date = '2021-02-25';
        $news->news_post_time = '08:30';
        $news->news_description = 'Prosedur Operasional Standar POS Juknis Ujian Sekolah PKPPS Pendidikan Kesetaraan Pondok Pesantren Ula Wustha Ulya tahun 2021 format PDF unduh gratis free download SK Dirjen Pendis no 782 th 2021.

        Informasi tentang petunjuk teknis Ujian Sekolah Tahun 2020/2021 untuk Pendidikan Kesetaraan Pondok Pesantren ( US PKPP Ula Wustha dan Ulya IPS) yang dahulu bernama PPS Wajardikdas, yaitu lembaga pendidikan dibawah naungan Kementerian Agama khususnya PD Pontren yang setara dengan Paket A milik Kemendiknas.';
        $news->news_photo = '';
        $news->news_poster = '351315000000000';
        $news->save();
    }
}
