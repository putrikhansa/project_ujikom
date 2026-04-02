<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi Kesehatan - SchoolCare</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-blue: #1977cc;
            --secondary-dark: #2c4964;
            --light-bg: #f4f7fa;
            --text-gray: #5e6e82;
        }

        body {
            background-color: var(--light-bg);
            font-family: "Open Sans", sans-serif;
            color: #444444;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            line-height: 1.6;
            /* Membuat teks paragraf lebih lega */
        }

        /* --- NAVBAR --- */
        #header {
            background: #fff;
            padding: 15px 0;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.08);
        }

        .logo h1 {
            font-size: 26px;
            margin: 0;
            font-weight: 700;
            font-family: "Poppins", sans-serif;
            letter-spacing: -0.5px;
        }

        .logo h1 a {
            color: var(--secondary-dark);
            text-decoration: none;
        }

        .navbar a {
            font-family: "Poppins", sans-serif;
            font-size: 15px;
            font-weight: 500;
            color: var(--secondary-dark);
            text-decoration: none;
            transition: 0.3s;
            padding: 10px 0 10px 30px;
        }

        .navbar a:hover,
        .navbar .active {
            color: var(--primary-blue);
        }

        .login-btn {
            background: var(--primary-blue);
            color: #fff !important;
            padding: 8px 25px !important;
            border-radius: 50px;
            margin-left: 30px;
        }

        /* --- CONTENT --- */
        .content-area {
            flex: 1;
            padding: 60px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-size: 32px;
            color: var(--secondary-dark);
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title h2::after {
            content: "";
            position: absolute;
            width: 50px;
            height: 3px;
            background: var(--primary-blue);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-title p {
            color: var(--text-gray);
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto;
        }

        /* --- CARDS --- */
        .edukasi-card {
            border: none;
            border-radius: 16px;
            background: #fff;
            transition: all 0.3s ease;
            height: 100%;
            overflow: hidden;
        }

        .edukasi-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body-custom {
            padding: 1.5rem;
        }

        .badge-category {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: #f0f7fe;
            color: var(--primary-blue);
            padding: 6px 12px;
            font-weight: 700;
        }

        .card-title-custom {
            font-family: "Poppins", sans-serif;
            font-size: 19px;
            font-weight: 600;
            color: var(--secondary-dark);
            margin: 12px 0;
            line-height: 1.4;
        }

        .card-text-custom {
            color: var(--text-gray);
            font-size: 14.5px;
            margin-bottom: 20px;
        }

        .btn-read-more {
            font-weight: 700;
            font-size: 14px;
            color: var(--primary-blue);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: 0.2s;
        }

        .btn-read-more:hover {
            gap: 10px;
        }

        /* --- MODAL --- */
        .modal-content {
            border-radius: 20px;
            border: none;
            padding: 10px;
        }

        .modal-header h5 {
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            color: var(--secondary-dark);
        }

        .modal-body {
            color: #444;
            font-size: 16px;
            line-height: 1.8;
        }

        .modal-img-custom {
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        /* --- FOOTER --- */
        #footer {
            background: #fff;
            border-top: 1px solid #eee;
            padding: 60px 0 30px;
        }

        #footer h3 {
            font-family: "Poppins", sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--secondary-dark);
        }

        #footer h4 {
            font-family: "Poppins", sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--secondary-dark);
            margin-bottom: 20px;
        }

        .footer-links ul li {
            padding: 5px 0;
            font-size: 14px;
        }

        .footer-links ul a {
            color: #777;
            text-decoration: none;
        }

        .footer-links ul a:hover {
            color: var(--primary-blue);
        }
    </style>
</head>

<body>

    <header id="header" class="sticky-top">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1><a href="/">SchoolCare</a></h1>
            </div>
            <nav class="navbar">
                <ul class="d-flex align-items-center m-0 p-0 list-unstyled">
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/#tentang">Tentang</a></li>
                    <li><a href="/#jadwal">Jadwal</a></li>
                    <li><a href="/#kegiatan">Kegiatan</a></li>
                    <li><a href="#" class="active">Edukasi</a></li>
                    <li><a href="/login" class="login-btn">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="content-area">
        <div class="container">
            <div class="section-title">
                <h2>Edukasi Kesehatan</h2>
                <p>Temukan berbagai artikel dan tips kesehatan harian untuk mendukung gaya hidup sehat di lingkungan
                    sekolah.</p>
            </div>

            <div class="row gy-4">
                @forelse ($edukasi as $item)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="edukasi-card shadow-sm w-100 d-flex flex-column">
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                                    alt="{{ $item->judul }}">
                            @endif
                            <div class="card-body-custom d-flex flex-column flex-grow-1">
                                <span class="badge badge-category rounded-pill align-self-start">
                                    {{ $item->kategoriEdukasi->nama_kategori ?? 'Umum' }}
                                </span>
                                <h5 class="card-title-custom">{{ $item->judul }}</h5>
                                <p class="card-text-custom flex-grow-1">
                                    {{ Str::limit(strip_tags($item->isi), 110) }}
                                </p>
                                <a href="{{ route('edukasi.show', $item->id) }}" class="btn-read-more">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-0 px-4 pt-4">
                                    <h5 class="modal-title m-0">{{ $item->judul }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-4 pb-4">
                                    @if ($item->foto)
                                        <div class="text-center">
                                            <img src="{{ asset('storage/' . $item->foto) }}" class="modal-img-custom">
                                        </div>
                                    @endif
                                    <div class="article-content">
                                        {!! nl2br(e($item->isi)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-journal-x fs-1 text-muted"></i>
                        <p class="text-muted mt-3">Belum ada materi edukasi yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $edukasi->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <footer id="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <h3>Medilab UKS</h3>
                    <p class="fw-bold text-primary mb-1">SMK Assalaam Bandung</p>
                    <p class="small text-muted mb-4">
                        Jl. Situ Tarate, Cibaduyut, Dayeuhkolot<br>
                        Kab. Bandung, Jawa Barat 40265
                    </p>
                    <div class="social-links d-flex">
                        <a href="#" class="me-2"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="me-2"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Tautan Cepat</h4>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-chevron-right text-primary me-2"></i><a href="/">Beranda</a></li>
                        <li><i class="bi bi-chevron-right text-primary me-2"></i><a href="/#tentang">Tentang Kami</a>
                        </li>
                        <li><i class="bi bi-chevron-right text-primary me-2"></i><a href="#">Layanan</a></li>
                        <li><i class="bi bi-chevron-right text-primary me-2"></i><a href="#">Edukasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Layanan UKS</h4>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-chevron-right text-primary me-2"></i><a href="#">Pemeriksaan Fisik</a>
                        </li>
                        <li><i class="bi bi-chevron-right text-primary me-2"></i><a href="#">Konsultasi Medis</a>
                        </li>
                        <li><i class="bi bi-chevron-right text-primary me-2"></i><a href="#">Pertolongan
                                Pertama</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4>Jam Operasional</h4>
                    <p class="small text-muted">Layanan UKS tersedia pada jam sekolah:</p>
                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2 small">
                        <span>Senin - Kamis:</span> <span class="fw-bold">07:00 - 15:30</span>
                    </div>
                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2 small">
                        <span>Jumat:</span> <span class="fw-bold">07:00 - 14:00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center mt-5 pt-3 border-top">
            <p class="m-0 small text-muted">© 2026 <strong>SchoolCare</strong>. All Rights Reserved</p>
            <p class="small text-primary mt-1">Proudly Developed by <span class="fw-bold">Siswa RPL SMK
                    Assalaam</span></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
