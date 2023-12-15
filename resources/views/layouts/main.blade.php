<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
<div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Pengelolaan Laundry</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('home') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('pesanan.index') }}">
    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
      <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Data Pesanan</span>
  </a>
</li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('pelanggan.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Pelanggan</span>
          </a>
        </li>
    
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Inventory Laundry</h6>
        </li>
        <li class="nav-item {{ Route::is('list') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('list') }}">
                <i class="bi bi-boxes "></i>
                    <span>List Barang</span></a>
            </li>
            
            <li class="nav-item {{ Route::is('barang-masuk') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('barang-masuk') }}">
                <i class="bi bi-truck"></i>
                    <span>Barang Masuk</span></a>
            </li>
            <li class="nav-item {{ Route::is('barang-keluar') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('barang-keluar') }}">
                    <i class="bi bi-truck"></i>
                    <span>Barang Keluar</span></a>
            </li>
      </ul>
    </div>
    
       
  </aside>
  <main class="main-content position-relative border-radius-lg ">
  <script>
  function loadPesananContent() {
    // Use AJAX, fetch API, or any other method to get the content
    // Replace the URL with the actual URL of your content
    fetch('/pesanan')
      .then(response => response.text())
      .then(content => {
        // Inject the fetched content into the content area
        document.getElementById('content-area').innerHTML = content;
      })
      .catch(error => console.error('Error fetching content:', error));
  }
</script>

<script>
    function loadPelangganContent() {
        fetch('/pelanggan') // Sesuaikan URL dengan rute yang sesuai
            .then(response => response.text())
            .then(content => {
                document.getElementById('content-area').innerHTML = content;
            })
            .catch(error => console.error('Error fetching content:', error));
    }
</script>

<script>
  function loadBarangContent() {
    // Use AJAX, fetch API, or any other method to get the content
    // Replace the URL with the actual URL of your content
    fetch('/barang')
      .then(response => response.text())
      .then(content => {
        // Inject the fetched content into the content area
        document.getElementById('content-area').innerHTML = content;
      })
      .catch(error => console.error('Error fetching content:', error));
  }
</script>

<script>
  function loadLaporanContent() {
    // Use AJAX, fetch API, or any other method to get the content
    // Replace the URL with the actual URL of your content
    fetch('/laporan')
      .then(response => response.text())
      .then(content => {
        // Inject the fetched content into the content area
        document.getElementById('content-area').innerHTML = content;
      })
      .catch(error => console.error('Error fetching content:', error));
  }
</script>