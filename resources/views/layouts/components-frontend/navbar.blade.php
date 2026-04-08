<style>
    /* ================= NAVBAR ================= */
    .navmenu {
        position: relative;
    }

    .navmenu ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .navmenu ul li {
        position: relative;
    }

    /* ================= DROPDOWN DESKTOP ================= */
    .navmenu .dropdown ul {
        position: absolute;
        top: 100%;
        left: 0;
        /* FIX biar ga geser */

        background: #ffffff;
        border-radius: 12px;
        padding: 8px 0;
        min-width: 180px;

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);

        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.25s ease;

        z-index: 999;
    }

    /* SHOW DROPDOWN */
    .navmenu .dropdown:hover ul {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* ITEM */
    .navmenu .dropdown ul li a {
        display: block;
        padding: 10px 18px;
        font-size: 14px;
        color: #444;
        transition: 0.2s;
    }

    .navmenu .dropdown ul li a:hover {
        background: #f1f5f9;
        color: #0d6efd;
    }

    /* ================= FIX MEDILAB MOBILE ================= */
    @media (min-width: 1200px) {
        .mobile-nav-toggle {
            display: none !important;
        }

        .navmenu {
            position: static !important;
        }

        .navmenu ul {
            flex-direction: row !important;
            background: none !important;
            position: static !important;
        }

        .navmenu ul li {
            width: auto !important;
        }

        .navmenu .dropdown ul {
            position: absolute !important;
            opacity: 0;
            visibility: hidden;
        }
    }

    /* ================= MOBILE (BIAR GA ANEH) ================= */
    @media (max-width: 1199px) {
        .navmenu ul {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .navmenu .dropdown ul {
            position: static;
            opacity: 1;
            visibility: visible;
            transform: none;
            box-shadow: none;
            padding-left: 10px;
        }
    }
</style>

<header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <a href="/" class="logo d-flex align-items-center">
                <h1 class="sitename mb-0">School<span>Care</span></h1>
            </a>

            <!-- NAVBAR -->
            <nav id="navmenu" class="navmenu">
                <ul>

                    <li><a href="#hero" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>
                    <li><a href="#obat">Obat</a></li>
                    <li><a href="#kegiatan">Kegiatan</a></li>
                    <li><a href="#edukasi">Edukasi</a></li>

                    @guest
                        <li>
                            <a class="cta-btn" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        @if (auth()->user()->role === 'siswa')
                            <li>
                                <a href="{{ route('siswa.riwayat') }}">Riwayat UKS</a>
                            </li>
                        @endif

                        <!-- DROPDOWN AKUN -->
                        <li class="dropdown">
                            <a href="#">
                                Akun <i class="bi bi-chevron-down"></i>
                            </a>

                            <ul>
                                @if (auth()->user()->role !== 'siswa')
                                    <li>
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                @endif

                                <li>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                    @endguest

                </ul>

                <!-- Toggle (tetep ada buat jaga-jaga) -->
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </div>
</header>
