<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">RPL</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


    

        <li class="nav-item dropdown pe-5">

          <a class="nav-link nav-profile d-flex align-items-center " href="#" data-bs-toggle="dropdown">
            {{-- <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Anda <span style="font-style: italic;"> {{ Auth::user()->role }}</span></h6>
              <span>Web Jurusan RPL</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              <button type="button" class="dropdown-item d-flex align-items-center" id="logout-button">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Log Out</span>
              </button>
          </li>
          
          

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
          <!-- Tambahkan SweetAlert -->
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
              document.getElementById("logout-button").addEventListener("click", function (e) {
                  e.preventDefault(); // Mencegah pengiriman form langsung
                  
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
                          document.getElementById("logout-form").submit(); // Kirim form jika dikonfirmasi
                      }
                  });
              });
          </script>

  </header><!-- End Header -->