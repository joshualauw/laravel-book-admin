<div id="wrapper">
  <div class="overlay"></div>
   <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <div class="sidebar-header">
        <div class="sidebar-brand">
          <a href="{{ route('dashboard') }}"><h1 class='text-center text-purple'>BUKU<span class="text-lavender">LA</span></h1></a>
        </div>
      </div>

      @if (Session::get("auth.role") == "super")
        <li><a href="{{ route('dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a></li>
        <li><a href="{{ route('barang') }}"><i class="fab fa-dropbox"></i> Barang</a></li>
        <li><a href="{{ route('kategori') }}"><i class="fas fa-sitemap"></i> Kategori</a></li>
        <li><a href="{{ route('pegawai') }}"><i class="fas fa-people-carry"></i> Pegawai</a></li>
        <li><a href="{{ route('gudang') }}"><i class="fas fa-warehouse"></i> Gudang</a></li>
        <li><a href="{{ route('departemen') }}"><i class="fas fa-balance-scale"></i> Departemen</a></li>
        <li><a href="{{ route('jabatan') }}"><i class="fas fa-user-tag"></i> Jabatan</a></li>
        <li><hr class="text-backwhite"></li>
        <li><a href="{{ route('access') }}"><i class="fas fa-key"></i> Access</a></li>
      @else
          @if (Session::get("auth.role") == "admin")
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a></li>
          @else
            <li><a href="{{ route('home') }}"><i class="fas fa-th-large"></i> Home</a></li>
          @endif
          @if (Session::get("auth.user")->access[0]->read || Session::get("auth.user")->jabatan->access[0]->read)
            <li><a href="{{ route('barang') }}"><i class="fab fa-dropbox"></i> Barang</a></li>
          @endif
          @if (Session::get("auth.user")->access[1]->read || Session::get("auth.user")->jabatan->access[1]->read)
            <li><a href="{{ route('kategori') }}"><i class="fas fa-sitemap"></i> Kategori</a></li>
          @endif  
          @if (Session::get("auth.user")->access[2]->read || Session::get("auth.user")->jabatan->access[2]->read)
            <li><a href="{{ route('pegawai') }}"><i class="fas fa-people-carry"></i> Pegawai</a></li>
          @endif 
          @if (Session::get("auth.user")->access[3]->read || Session::get("auth.user")->jabatan->access[3]->read)
            <li><a href="{{ route('gudang') }}"><i class="fas fa-warehouse"></i> Gudang</a></li>
          @endif
          @if (Session::get("auth.user")->access[4]->read || Session::get("auth.user")->jabatan->access[4]->read)
            <li><a href="{{ route('departemen') }}"><i class="fas fa-balance-scale"></i> Departemen</a></li>
          @endif
          @if (Session::get("auth.user")->access[5]->read || Session::get("auth.user")->jabatan->access[5]->read)
            <li><a href="{{ route('jabatan') }}"><i class="fas fa-user-tag"></i> Jabatan</a></li>
          @endif
          <li><hr class="text-backwhite"></li>
          <li><a href="{{ route('pengambilan') }}"><i class="far fa-check-square"></i> Pengambilan</a></li>
          <li><a href="{{ route('retur') }}"><i class="fas fa-undo-alt"></i> Retur</a></li>
        </p>
      @endif
      <li><a href="{{ route('login') }}/out"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
      <p class="text-backwhite" style="position: absolute; bottom:-40px; left:40px">Login as: {{ Session::get("auth.user")->username }}
 </nav>
