@extends(backpack_view('blank'))

@php
    $user = backpack_auth()->user();
    if ($user->role == 'Dosen') {
        $user = $user->dosen;
    } elseif ($user->role == 'Kepala Urusan Sumber Daya') {
        $user = $user->kepalaUrusanSumberDaya;
    } elseif ($user->role == 'Ketua Kelompok Keahlian') {
        $user = $user->ketuaKelompokKeahlian;
    } elseif ($user->role == 'Ketua Program Studi') {
        $user = $user->kaprodi;
    } elseif ($user->role == 'Pegawai') {
        $user = $user->pegawai;
    } elseif ($user->role == 'Bidang II') {
        $user = $user->bidangII;
    }
    $widgets['before_content'][] = [
        'type' => 'jumbotron',
        'heading' => 'Selamat Datang, ' . $user->nama,
        'content' => '<p class="lead">Management Talenta adalah <i>platform management</i> Talenta yang digunakan untuk mengelola seluruh talent agar dapat ditindaklanjuti secara efektif dan sistematis. Selain itu, Management Talenta juga digunakan untuk mengeksplorasi potensial kenaikan jabatan. </p>',
    ];
@endphp
