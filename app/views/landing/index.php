<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SIPSKEP - ajukan Surat Keterangan Menikah dan Surat Izin Cerai secara online, lalu pantau statusnya.">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASEURL ?>assets/images/favicon.png">
    <title><?= $data['judul']; ?></title>
    <link href="<?= BASEURL ?>assets/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>assets/dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand bg-white border-bottom p-t-10 p-b-10">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-info m-r-0" href="<?= BASEURL ?>">SIPSKEP</a>
            <div class="ml-auto">
                <a href="<?= BASEURL ?>auth" class="btn btn-sm btn-outline-info">Masuk</a>
                <a href="<?= BASEURL ?>auth/signup" class="btn btn-sm btn-info">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="bg-info text-white p-t-40 p-b-40">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-7">
                    <h1 class="text-white font-weight-bold">Urus surat kependudukan tanpa antre</h1>
                    <p class="m-t-20 m-b-30">Ajukan Surat Keterangan Menikah dan Surat Izin Cerai secara online,
                        lalu pantau status pengajuannya dari satu dashboard.</p>
                    <a href="<?= BASEURL ?>auth/signup" class="btn btn-lg btn-light text-info m-b-10">Daftar Sekarang</a>
                    <a href="<?= BASEURL ?>auth" class="btn btn-lg btn-outline-light m-b-10">Sudah punya akun</a>
                </div>
                <div class="col-12 col-md-5 text-center d-none d-md-block">
                    <i class="fas fa-file-alt" style="font-size:140px; opacity:.35"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan -->
    <section class="p-t-40 p-b-20">
        <div class="container">
            <h4 class="font-weight-bold m-b-5">Layanan</h4>
            <p class="text-muted m-b-30">Diajukan online, diverifikasi petugas kelurahan sampai camat.</p>
            <div class="row">
                <div class="col-12 col-md-4 m-b-20">
                    <div class="card border h-100 m-b-0">
                        <div class="card-body">
                            <i class="fas fa-heart fa-2x text-info"></i>
                            <h5 class="card-title m-t-15">Surat Keterangan Menikah</h5>
                            <p class="card-text text-muted">Data calon pengantin dan pasangan, lengkap dengan nomor
                                surat setelah disetujui.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 m-b-20">
                    <div class="card border h-100 m-b-0">
                        <div class="card-body">
                            <i class="fas fa-file-alt fa-2x text-info"></i>
                            <h5 class="card-title m-t-15">Surat Izin Cerai</h5>
                            <p class="card-text text-muted">Pengajuan izin cerai beserta riwayat pengajuan yang bisa
                                dilihat kapan saja.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 m-b-20">
                    <div class="card border h-100 m-b-0">
                        <div class="card-body">
                            <i class="fas fa-home fa-2x text-muted"></i>
                            <h5 class="card-title m-t-15">Surat Pindah Penduduk
                                <span class="badge badge-secondary align-middle">Segera</span>
                            </h5>
                            <p class="card-text text-muted">Belum tersedia. Menyusul pada pembaruan berikutnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur -->
    <section class="bg-light p-t-40 p-b-40">
        <div class="container">
            <h4 class="font-weight-bold m-b-30">Cara pengajuan</h4>
            <div class="row">
                <div class="col-12 col-md-4 m-b-20 d-flex">
                    <span class="bg-info text-white rounded-circle text-center m-r-15 flex-shrink-0"
                        style="width:44px; height:44px; line-height:44px"><i class="fas fa-user-plus"></i></span>
                    <div>
                        <h6 class="font-weight-bold">1. Daftar &amp; aktivasi</h6>
                        <p class="text-muted m-b-0">Buat akun, lalu klik tautan aktivasi yang dikirim ke email Anda.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 m-b-20 d-flex">
                    <span class="bg-info text-white rounded-circle text-center m-r-15 flex-shrink-0"
                        style="width:44px; height:44px; line-height:44px"><i class="fas fa-paper-plane"></i></span>
                    <div>
                        <h6 class="font-weight-bold">2. Ajukan surat</h6>
                        <p class="text-muted m-b-0">Isi formulir sesuai jenis surat, tanpa datang ke kantor.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 m-b-20 d-flex">
                    <span class="bg-info text-white rounded-circle text-center m-r-15 flex-shrink-0"
                        style="width:44px; height:44px; line-height:44px"><i class="fas fa-search"></i></span>
                    <div>
                        <h6 class="font-weight-bold">3. Pantau status</h6>
                        <p class="text-muted m-b-0">Lihat perkembangan verifikasi dan nomor surat dari dashboard.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="p-t-40 p-b-40 text-center">
        <div class="container">
            <h4 class="font-weight-bold">Siap mengajukan surat?</h4>
            <p class="text-muted m-b-20">Pendaftaran gratis, cukup dengan email aktif.</p>
            <a href="<?= BASEURL ?>auth/signup" class="btn btn-lg btn-info">Buat Akun <i
                    class="fas fa-arrow-right m-l-5"></i></a>
        </div>
    </section>

    <footer class="bg-dark text-white p-t-20 p-b-20">
        <div class="container d-md-flex justify-content-between">
            <span>SIPSKEP &mdash; Sistem Informasi Pelayanan Surat Kependudukan</span>
            <span class="text-muted">&copy; <?= date('Y'); ?></span>
        </div>
    </footer>

</body>

</html>
