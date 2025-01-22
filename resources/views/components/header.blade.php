
{{--Mengubah warna background bar di atas saat masuk dashboard--}}
<div class="navbar-bg" style="background-color: rgba(113, 236, 113, 0.549);"></div>

<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#"
                    data-toggle="sidebar"
                    class="nav-link nav-link-lg">
                    {{--Mengubah warna icon sidebar garis tiga--}}
                    <i class="fas fa-bars" style="font-size:25px; color: rgb(2, 116, 2)"></i>
                </a>
            </li>
        </ul>
    </form>
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('img/SIMPOREK.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">
                {{-- Mengubah warna Hi admin --}}
                <span style="font-weight: bold; font-size: 18px; color: rgb(2, 92, 2);">Hi, </span>
                <span style="font-size: 18px; color: rgb(2, 92, 2);">{{ auth()->user()->name }}</span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="post">
                @csrf
            </form>
        </div>
    </li>
    </ul>
</nav>
