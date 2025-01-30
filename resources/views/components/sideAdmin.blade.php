<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('berandaAdminUtama') ? '' : 'collapsed' }}" href="{{ route('berandaAdminUtama') }}">
              <i class="bi bi-house"></i>
              <span>Beranda</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('berandaAdmin', 'tentangAdmin', 'kurikulumAdmin', 'kegiatanAdmin', 'alumniAdmin') ? '' : 'collapsed' }}" 
             data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-eye"></i><span>Tampilan</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse {{ request()->routeIs('berandaAdmin', 'tentangAdmin', 'kurikulumAdmin', 'kegiatanAdmin', 'alumniAdmin') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
              <li>
                  <a href="{{ route('berandaAdmin') }}" class="{{ request()->routeIs('berandaAdmin') ? 'active' : '' }}">
                      <i class="bi bi-circle"></i><span>Beranda</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('tentangAdmin') }}" class="{{ request()->routeIs('tentangAdmin') ? 'active' : '' }}">
                      <i class="bi bi-circle"></i><span>Tentang</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('kurikulumAdmin') }}" class="{{ request()->routeIs('kurikulumAdmin') ? 'active' : '' }}">
                      <i class="bi bi-circle"></i><span>Kurikulum</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('kegiatanAdmin') }}" class="{{ request()->routeIs('kegiatanAdmin') ? 'active' : '' }}">
                      <i class="bi bi-circle"></i><span>Kegiatan</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('alumniAdmin') }}" class="{{ request()->routeIs('alumniAdmin') ? 'active' : '' }}">
                      <i class="bi bi-circle"></i><span>Alumni</span>
                  </a>
              </li>
          </ul>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('testimoniKonfirAdmin') ? '' : 'collapsed' }}" 
             data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-check-circle"></i><span>Konfirmasi Data</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse {{ request()->routeIs('testimoniKonfirAdmin') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
              <li>
                  <a href="{{ route('testimoniKonfirAdmin') }}" class="{{ request()->routeIs('testimoniKonfirAdmin') ? 'active' : '' }}">
                      <i class="bi bi-circle"></i><span>Data Testimoni</span>
                  </a>
              </li>
          </ul>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('password.change') ? 'active' : 'collapsed' }}" href="{{ route('password.change') }}">
              <i class="bi bi-key"></i>
              <span>Ubah Password</span>
          </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" onclick="confirmLogout(event)">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>
    </li>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
    <script>
        function confirmLogout(event) {
            event.preventDefault();  // Mencegah aksi default (logout langsung)
            
            // Menampilkan SweetAlert2 konfirmasi
            Swal.fire({
                      title: "Konfirmasi Logout",
                      text: "Apakah Anda yakin ingin logout?",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#d33",
                      cancelButtonColor: "#3085d6",
                      confirmButtonText: "Ya, Logout",
                      cancelButtonText: "Batal"
                  }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan "Ya, logout!", kirim form logout
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
    
    

  </ul>
</aside>



