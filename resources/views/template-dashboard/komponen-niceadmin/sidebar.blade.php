 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/dashboard') }}">
                <i class="bi bi-grid"></i>
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
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('laptop-total') }}">
                <i class="bi bi-laptop"></i>
                <span>Laptop Total</span>
            </a>
        </li>

         <li class="nav-heading">-</li>

         <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/costumer') }}">
                <i class="bi bi-person"></i>
                <span>Costumer</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#servisan" data-bs-toggle="collapse" href="#">
              <i class="bi bi-tools"></i><span>Servisan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="servisan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ url('/servisan') }}">
                  <i class="bi bi-circle-fill"></i><span>Daftar Servisan</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/servisan-teknisi') }}">
                  <i class="bi bi-circle-fill"></i><span>Servisan Teknisi</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/laporan-teknisi-harian') }}">
                  <i class="bi bi-circle-fill"></i><span>Laporan Harian</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="bi bi-circle-fill"></i><span>Laporan Bulanan</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="bi bi-circle-fill"></i><span>Form Validation</span>
                </a>
              </li>
            </ul>
          </li><!-- End Forms Nav -->

         <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/penyewaan') }}">
                <i class="bi bi-hourglass-split"></i>
                <span>Penyewan</span>
            </a>
        </li>         

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/laptop-terjual') }}">
                <i class="bi bi-cart"></i>
                <span>Penjualan Laptop</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/laptop-terjual') }}">
                <i class="bi bi-cart"></i>
                <span>Transaksi</span>
            </a>
        </li>

        {{-- menu Accounting --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/accounting') }}">
                <i class="bi bi-calculator"></i>
                <span>Accounting</span>
            </a>
        </li>
        {{-- /menu Accounting --}}

        <li class="nav-item">
            <a class="nav-link collapsed" href="https://wa.me/6282346404299" target="_blank">
                <i class="bi bi-whatsapp"></i>
                <span>Berikan Saran</span>
            </a>
        </li>
        
        @if ($user->level_akun_id == 1)
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('/karyawan') }}">
              <i class="bi bi-person-badge"></i>
              <span>Karyawan</span>
          </a>
        </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/user') }}">
                    <i class="bi bi-person-gear"></i>
                    <span>Akun</span>
                </a>
            </li>
        @endif

     </ul>
     {{-- <div class="position-absolute bottom-0 mb-2 bg-text seondary text-center" style="font-size: 15px"><span class="text-center"><u>Teknisi_ta' V-Beta 1.0</u></span></div> --}}

 </aside><!-- End Sidebar-->
