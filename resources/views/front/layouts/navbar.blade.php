<nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
        <li><a class="nav-link scrollto active" href="{{'/'}}">Home</a></li>
        <li><a class="nav-link scrollto" href="{{('profil')}}">Profil</a></li>
        <li><a class="nav-link scrollto" href="{{('berita')}}">Berita</a></li>

        <li class="dropdown"><a class="nav-link scrollto" href="#"><span>Layanan</span> <i
                    class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{ ('ugd') }}">IGD 24 Jam</a></li>
                <li><a href="{{   ('rawatjalan') }}">Rawat Jalan</a></li>
                <li><a href="{{('rawatinap')}}">Rawat Inap</a></li>
                {{-- <li><a href="#">Penunjang Medis</a></li>
                <li><a href="#">Fasilitas</a></li> --}}
            </ul>
        </li>
        {{-- <li><a class="nav-link scrollto" href="#services">Fasilitas</a></li> --}}
        <li class="dropdown"><a class="nav-link scrollto" href="#services"><span>Dokter</span> <i
                    class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="#">Dokter Kami</a></li>
                <li><a href="#">Jadwal Dokter Spesialis</a></li>
                <li><a href="#">Jadwal Dokter NonSpesialis</a></li>
            </ul>
        </li>
       
        {{-- <li><a class="nav-link scrollto" href="#gallery">Galeri</a></li> --}}
        {{-- <li><a class="nav-link scrollto" href="#departments">Departemen</a></li> --}}
        {{-- <li><a class="nav-link scrollto" href="#doctors">Dokter</a></li> --}}
        <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->