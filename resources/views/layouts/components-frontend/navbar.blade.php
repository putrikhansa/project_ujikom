<header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">School<span>Care</span></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    {{-- MENU UMUM --}}
                    <li><a href="#hero" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>

                    <li><a href="#obat">Obat</a></li>

                    <li><a href="#kegiatan">Kegiatan</a></li>
                    <li><a href="#edukasi">Edukasi</a></li>

                    @guest
                        {{-- JIKA BELUM LOGIN --}}
                        <li>
                            <a class="cta-btn ms-xl-4" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        {{-- JIKA LOGIN SEBAGAI SISWA --}}
                        @if (auth()->user()->role === 'siswa')
                            <li>
                                <a href="{{ route('siswa.riwayat') }}">Riwayat UKS</a>
                            </li>
                        @endif

                        {{-- MENU AKUN --}}
                        <li class="dropdown">
                            <a href="#">
                                <span>Akun</span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                            </a>
                            <ul>
                                {{-- DASHBOARD HANYA ADMIN & PETUGAS --}}
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

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </div>
</header>
