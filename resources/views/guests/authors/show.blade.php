@extends('guests.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="profile mt-4 text-center">
                    <div class="avatar">
                        <img src="{{ asset('images/logo_mts.jpg') }}" alt="Circle Image" style="max-height: 250px !important"
                            class="img-raised rounded-circle img-fluid">
                    </div>
                    <div class="name">
                        <h2 class="title">Madrasah Tsanawiyah (MTs) Al-Mubarok</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="description col-md-10 ml-auto mr-auto text-center">
            <div class="name">
                <h3 class="title">Visi</h3>
            </div>
            <p>Menciptakan sumber daya manusia yang unggul berdasarkan Al-Qur'an dan Hadits, berakhlakul karimah, serta
                mampu membangun diri, keluarga, dan bangsa sesuai ridha Allah SWT.</p>
        </div>
        <div class="description col-md-10 ml-auto mr-auto text-center">
            <div class="name">
                <h3 class="title">Misi</h3>
            </div>
            <ul class="list-unstyled">
                <li>Menumbuhkan peserta didik yang beriman, bertaqwa, dan berakhlak mulia.</li>
                <li>Mendorong kemampuan berpikir kreatif, aktif, dan terampil dalam pemecahan masalah.</li>
                <li>Membekali peserta didik dengan wawasan luas di berbagai disiplin ilmu.</li>
                <li>Menciptakan lingkungan yang mendidik nilai kejujuran, disiplin, dan tanggung jawab.</li>
                <li>Mengembangkan potensi agar mampu bersaing dengan lulusan sekolah lain yang sederajat.</li>
                <li>Mengajarkan nilai kasih sayang kepada sesama serta menghormati guru dan orang tua.</li>
            </ul>
        </div>
        <div class="description col-md-10 ml-auto mr-auto text-center">
            <div class="name">
                <h3 class="title">Moto</h3>
            </div>
            <p>"Terdepan dalam berfikir, tercepat dalam berbuat, tertinggi dalam berakhlak."</p>
        </div>
    </div>
    <div class="container my-5 mb-5 pb-5">
        {{-- <h1 class="text-center">Profil Madrasah Tsanawiyah (MTs) Al-Mubarok</h1> --}}

        <hr>
        <section id="sejarah">
            <h3>Sejarah Singkat</h3>
            <p>MTs Al-Mubarok didirikan pada tahun 1989 di Kelurahan Panunggangan, Kecamatan Pinang, Kota Tangerang.
                Awalnya, madrasah ini menginduk pada MTs Daarul Muqorrobin selama dua tahun sebelum resmi berdiri mandiri
                pada tahun 1994. Sejak berdiri, MTs Al-Mubarok telah meluluskan lebih dari 8.000 siswa.</p>
        </section>
        <section id="akreditasi">
            <h3>Status Akreditasi</h3>
            <p>MTs Al-Mubarok telah mengalami peningkatan status akreditasi dari waktu ke waktu:</p>
            <ul>
                <li>1989 - 2000: Terdaftar</li>
                <li>2000 - 2005: Diakui</li>
                <li>2005 - 2009: Terakreditasi B</li>
                <li>2009 - 2022: Terakreditasi B+</li>
            </ul>
        </section>
        <section id="fasilitas">
            <h3>Fasilitas Pendidikan</h3>
            <p>Madrasah ini berada di lahan seluas 1.045 m² dengan berbagai fasilitas:</p>
            <ul>
                <li>Ruang Kelas</li>
                <li>Laboratorium Komputer</li>
                <li>Perpustakaan dengan luas 30 m² dan koleksi 1.000 buku</li>
                <li>Ruang OSIS, BP/BK, dan Aula</li>
                <li>Lapangan Bermain seluas 700 m²</li>
            </ul>
        </section>
        <section id="ekstrakurikuler">
            <h3>Kegiatan Ekstrakurikuler</h3>
            <p>Berbagai kegiatan ekstrakurikuler yang ditawarkan, antara lain:</p>
            <ul>
                <li>Olahraga: Karate, futsal, dan paskibra</li>
                <li>Kesenian: Marawis, hadroh, tari, dan gitar</li>
                <li>Pramuka</li>
                <li>Seni Bela Diri: Pencak Silat</li>
            </ul>
        </section>
        <section id="kepemimpinan">
            <h3>Perkembangan Kepemimpinan</h3>
            <p>Sejak didirikan, MTs Al-Mubarok telah dipimpin oleh beberapa kepala madrasah. Saat ini, madrasah dipimpin
                oleh Mukafi S.Pd.I untuk periode 2021-2024.</p>
        </section>
        <section id="yayasan">
            <h3>Struktur Yayasan</h3>
            <p>Yayasan Al-Mubarok Panunggangan telah memiliki beberapa periode kepengurusan. Ketua Pembina Yayasan saat ini
                adalah K.H. Ma’mun Mutaqin, dengan Dewan Pengawas H. Maryono AP. M.Si., dan Ketua Umum H. Jayadi.</p>
        </section>
        <section id="siswa">
            <h3>Jumlah dan Komposisi Siswa</h3>
            <p>Pada tahun ajaran 2022/2023, jumlah siswa di MTs Al-Mubarok mencapai 320 orang, dengan komposisi 168
                laki-laki dan 152 perempuan.</p>
        </section>
        <section id="dana">
            <h3>Sumber Dana dan Pembiayaan</h3>
            <p>Madrasah ini dibiayai oleh iuran komite (SPP) dan Bantuan Operasional Sekolah (BOS), yang digunakan untuk
                operasional sekolah, honor guru, dan kegiatan ekstrakurikuler.</p>
        </section>
        <section id="lokasi">
            <h3>Lokasi Geografis</h3>
            <p>MTs Al-Mubarok berlokasi di Jl. Kyai Maja, Kelurahan Panunggangan, Kecamatan Pinang, Kota Tangerang, dengan
                batas-batas wilayah yang memudahkan akses dari beberapa daerah sekitar Tangerang.</p>
        </section>
    </div>
@endsection
