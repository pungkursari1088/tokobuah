<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Products</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/products/add') ?>">New Product</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Product</a>
        </div>
    </li> -->

    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-book"></i>
            <span>Buku</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/books') ?>">List Nama Buku</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/book_comes') ?>">List Buku Masuk</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/books/add') ?>">Tambah Nama Buku</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/book_comes/add') ?>">Tambah Buku Masuk</a>
            <!-- <a class="dropdown-item" href="<?php echo site_url('admin/history') ?>">Buku Masuk/Keluar</a> -->
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Pembeli</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/buyers/index') ?>">List Pembeli</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/buyer_addresses/index') ?>">List Alamat</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/buyers/add') ?>">Tambah Pembeli</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/buyer_addresses/add') ?>">Tambah Alamat Pembeli</a>
            
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-book"></i>
            <span>History</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/history/index') ?>">History Pembelian</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/history/add') ?>">Tambah Pembelian</a>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
</ul>
