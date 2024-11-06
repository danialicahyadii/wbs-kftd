<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <a class="navbar-brand logo_h" href="/"><img width="90" src="lorahost/img/kftd_white.png"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link"
                                href="/">Beranda</a></li>
                        {{-- <li class="nav-item {{ Request::is('*syarat-ketentuan*') ? 'active' : '' }}"><a class="nav-link" href="syarat-ketentuan">Syarat & Ketentuan</a></li> --}}
                        <li class="nav-item {{ Request::is('*kontak-kami*') ? 'active' : '' }}"><a class="nav-link"
                                href="kontak-kami">Kontak Kami</a>
                        <li class="nav-item {{ Request::is('*faq*') ? 'active' : '' }}"><a class="nav-link"
                                href="faq">Faq</a>
                    </ul>

                    <div class="nav-right text-center text-lg-right py-4 py-lg-0">
                        @if (auth()->user())
                            @role('Admin')
                                <a class="button button-link btn-small mr-4" style="color: yellow"
                                    href="{{ route('pengaduan.index') }}">Hi, Admin</a>
                            @endrole
                            <a class="button button-link mr-4" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                                    class="align-middle"><i class="ti-user"></i></span> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a class="button button-outline button-small" href="{{ route('login') }}">Masuk/Daftar</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
