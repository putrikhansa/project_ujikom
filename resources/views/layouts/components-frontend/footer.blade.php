<footer id="footer" class="footer light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center text-decoration-none">
                    <span class="sitename">Medilab UKS</span>
                </a>
                <div class="footer-contact pt-3">
                    <p class="fw-bold mb-1">SMK Assalaam Bandung</p>
                    <p>Jl. Situ Tarate, Cibaduyut, Dayeuhkolot</p>
                    <p>Kab. Bandung, Jawa Barat 40265</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>(022) 5420220</span></p>
                    <p><strong>Email:</strong> <span>marketing@smkassalaam.sch.id</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="https://x.com/smkassalaam" target="_blank"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/smkassalaam/" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/smkassalaam/" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/@smkassalaambandung401" target="_blank"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="#edukasi">Edukasi</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Layanan UKS</h4>
                <ul>
                    <li><a href="#">Pemeriksaan Fisik</a></li>
                    <li><a href="#">Konsultasi Medis</a></li>
                    <li><a href="#">Pertolongan Pertama</a></li>
                    <li><a href="#">Data Kesehatan Siswa</a></li>
                    <li><a href="#">Obat-obatan Dasar</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-links">
                <h4>Jam Operasional</h4>
                <p>Layanan UKS tersedia pada jam sekolah:</p>
                <ul class="list-unstyled">
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span>Senin - Kamis:</span>
                        <span>07:00 - 15:30</span>
                    </li>
                    <li class="d-flex justify-content-between border-bottom pb-2">
                        <span>Jumat:</span>
                        <span>07:00 - 14:00</span>
                    </li>
                    <li class="mt-2 text-muted italic">
                        <small>*Tutup pada hari libur nasional</small>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4 border-top pt-4">
        <p>© {{ date('Y') }} <strong class="px-1 sitename">SchoolCare</strong>. <span>All Rights Reserved</span></p>
        <div class="credits">
            Proudly Developed by <a href="https://smkassalaam.sch.id/" class="text-primary fw-bold">Siswa RPL SMK Assalaam</a>
        </div>
    </div>

</footer>

<style>
    /* Tambahan sedikit CSS agar footer lebih cantik */
    .footer {
        font-size: 14px;
        background-color: #f8f9fa;
    }
    .footer-links ul i {
        padding-right: 2px;
        color: #1977cc;
        font-size: 12px;
        line-height: 0;
    }
    .footer-links h4 {
        font-size: 16px;
        font-weight: bold;
        position: relative;
        padding-bottom: 12px;
    }
    .footer-about .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid #ddd;
        font-size: 16px;
        color: #444;
        margin-right: 10px;
        transition: 0.3s;
    }
    .footer-about .social-links a:hover {
        color: #fff;
        background-color: #1977cc;
        border-color: #1977cc;
    }
</style>
