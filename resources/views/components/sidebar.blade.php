<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="home" style="font-size:25px; color: white">SIMPOREK</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="home">
                <img src="{{ asset('img/SIMPOREK.png') }}" alt="SIMPOREK Logo" style="width: 30px; height: 30px;">
            </a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-capsules " style="color: white"></i><span style="color: white; font-weight: bold">Data Obat</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('stokobats.index') }}"><i class="fas fa-capsules" style="color: white;"></i><span style="color: white; font-weight: bold;">Stok Obat</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('masterobats.index') }}"><i class="fas fa-pills" style="color: white;"></i><span style="color: white; font-weight: bold;">Daftar Obat</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('obatmasuks.index') }}"><i class="fas fa-arrow-circle-down" style="color: white;"></i><span style="color: white; font-weight: bold;">Obat Masuk</span></a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('obatkeluars.index') }}"><i class="fas fa-arrow-circle-up" style="color: red;"></i><span style="color: white; font-weight: bold;">Obat Keluar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('rekammedis.index') }}" class="nav-link"><i class="fas fa-plus-square" style="color: rgba(255, 0, 0, 0.675)"></i><span style="color: white; font-weight: bold">Rekam Medis</span></a>
            </li>

        </ul>
    </aside>
</div>

<script>
    // Ambil semua elemen dengan class "hoverable"
    const hoverableElements = document.querySelectorAll('.hoverable');

    // Loop melalui setiap elemen dan tambahkan event listener untuk mouseenter dan mouseleave
    hoverableElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            element.classList.add('hover');
        });
        element.addEventListener('mouseleave', () => {
            element.classList.remove('hover');
        });
    });
</script>
