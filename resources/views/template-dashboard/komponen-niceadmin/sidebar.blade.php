 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/dashboard') }}">
                <i class="bi bi-laptop"></i>
                <span>Dashboard</span>
            </a>
        </li>

         <li class="nav-heading">Stok Laptop</li>
         
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('mt') }}">
                <i class="bi bi-laptop"></i>
                <span>Merek & Tipe</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('laptop') }}">
                <i class="bi bi-laptop"></i>
                <span>Laptop</span>
            </a>
        </li>

         <li class="nav-heading">Penyewaan</li>

         <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/penyewaan') }}">
                <i class="fas fa-laptop"></i>
                <span>Laptop Penyewaan</span>
            </a>
        </li>
        
        @if ($user->level_akun_id == 1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/user') }}">
                    <i class="bi bi-users"></i>
                    <span>Akun</span>
                </a>
            </li>
        @endif
         

        {{-- <li class="nav-heading">Penjualan</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/laptop-terjual') }}">
                <i class="fas fa-laptop"></i>
                <span>Laptop Terjual</span>
            </a>
        </li> --}}

         

         {{-- <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="tables-general.html">
                         <i class="bi bi-circle"></i><span>General Tables</span>
                     </a>
                 </li>
                 <li>
                     <a href="tables-data.html">
                         <i class="bi bi-circle"></i><span>Data Tables</span>
                     </a>
                 </li>
             </ul>
         </li> --}}
         <!-- End Tables Nav -->

     </ul>

 </aside><!-- End Sidebar-->
