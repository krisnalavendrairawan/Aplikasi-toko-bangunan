<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              {{-- jika urlnya adalah dashboard maka tampilkan class active --}}
              <span data-feather="users" class="align-text-bottom"></span>
              Karyawan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/produk*') ? 'active' : '' }}" href="/dashboard/produk">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/penjualan') ? 'active' : '' }}" href="/dashboard/penjualan">
              <span data-feather="briefcase" class="align-text-bottom"></span>
              Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/penjualan_has_produk') ? 'active' : '' }}" href="/dashboard/penjualan_has_produk">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Penjualan Has Produk
            </a>
          </li>
        </ul>

        
      </div>
    </nav>