<div class="main-sidebar sidebar-style-2 shadow">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">WASAKOM</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class=active><a class="nav-link" href="{{url('/')}}">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
            
            <li>
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="fas fa-laptop"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('mt') }}">
                    <i class="fas fa-laptop"></i>
                    <span>Merek & Tipe</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('laptop') }}">
                    <i class="fas fa-laptop"></i>
                    <span>Laptop</span>
                </a>
            </li>
            <li class="menu-header">PENYEWAAN</li>
            <li>
                <a class="nav-link" href="{{ url('/dalam-penyewaan') }}">
                    <i class="fas fa-laptop"></i>
                    <span>Dalam Penyewaan</span>
                </a>
            </li>
            <li class="menu-header">PENJUALAN</li>
            <li>
                <a class="nav-link" href="{{ url('/laptop-terjual') }}">
                    <i class="fas fa-laptop"></i>
                    <span>Laptop Terjual</span>
                </a>
            </li>

        </ul>
        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
