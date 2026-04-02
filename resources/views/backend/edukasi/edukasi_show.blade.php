<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->judul }} - SchoolCare</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #1977cc;
            --secondary-color: #2c4964;
            --soft-blue: #f4f9fd;
            --text-main: #344767;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            background-color: #f8f9fa;
            line-height: 1.7;
        }

        /* Navbar Styling */
        #header {
            background: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
        }

        .logo h1 a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        /* Header Area */
        .article-hero {
            background-color: white;
            padding: 50px 0;
            border-bottom: 1px solid #eee;
        }

        .category-badge {
            background: var(--soft-blue);
            color: var(--primary-color);
            font-weight: 600;
            font-size: 13px;
            padding: 8px 16px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 15px;
        }

        /* Image Styling */
        .img-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            max-width: 600px;
            /* Ukuran foto tetap terkontrol */
            margin-left: auto;
            margin-right: auto;
        }

        /* Article Content */
        .article-body {
            font-size: 18px;
            color: #4a5568;
            text-align: justify;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        }

        /* Sidebar Style */
        .sidebar-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
            position: sticky;
            top: 100px;
        }

        .sidebar-title {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--secondary-color);
            border-left: 4px solid var(--primary-color);
            padding-left: 15px;
        }

        /* Footer */
        #footer {
            background: white;
            padding: 40px 0;
            margin-top: 80px;
            border-top: 1px solid #eee;
        }

        .back-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .back-link:hover {
            color: var(--secondary-color);
        }
    </style>
</head>

<body>

    <header id="header" class="sticky-top">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1><a href="/">SchoolCare</a></h1>
            </div>
            <a href="{{ route('edukasi.indexUser') }}" class="back-link">
                <i class="bi bi-arrow-left-circle-fill"></i> Kembali ke List
            </a>
        </div>
    </header>

    <main>
        <div class="article-hero">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-10">
                        <span class="category-badge">{{ $item->kategoriEdukasi->nama_kategori ?? 'Umum' }}</span>
                        <h1 class="fw-bold display-5 mb-3"
                            style="color: var(--secondary-color); font-family: 'Poppins', sans-serif;">
                            {{ $item->judul }}
                        </h1>
                        <div class="d-flex justify-content-center align-items-center text-muted small">
                            <span class="me-3"><i class="bi bi-person-circle me-1"></i> Tim Medis UKS</span>
                            <span><i class="bi bi-calendar3 me-1"></i> {{ $item->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row g-4">
                <div class="col-lg-8">
                    @if ($item->foto)
                        <div class="img-container">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid w-100" alt="Cover">
                        </div>
                    @endif

                    <div class="article-body">
                        {!! nl2br(e($item->isi)) !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar-card">
                        <h4 class="sidebar-title">Tips Kesehatan Lain</h4>
                        <p class="small text-muted">Tetap update dengan informasi kesehatan terbaru dari SchoolCare
                            untuk mendukung belajarmu!</p>

                        <div class="alert alert-primary border-0 shadow-sm mb-0">
                            <h6 class="fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Butuh Bantuan?</h6>
                            <p class="small mb-0">Jika merasa kurang sehat, segera kunjungi ruang UKS pada jam
                                operasional sekolah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer">
        <div class="container text-center">
            <h5 class="fw-bold mb-1">Medilab UKS</h5>
            <p class="text-muted small mb-0">SMK Assalaam Bandung - Mencetak Generasi Sehat & Berprestasi</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
