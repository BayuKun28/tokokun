<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?= base_url('Supplier'); ?>"><i class="fa fa-truck fa-fw"></i> Supplier</a>
            </li>
            <li>
                <a href="<?= base_url('Pelanggan'); ?>"><i class="fa fa-sitemap fa-fw"></i> Pelanggan</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-archive fa-fw"></i> Produk<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url('Kategori_produk'); ?>">Kategori Produk</a>
                    </li>
                    <li>
                        <a href="<?= base_url('Satuan_produk'); ?>">Satuan Produk</a>
                    </li>
                    <li>
                        <a href="<?= base_url('Produk'); ?>">Produk</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Stok<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url('Stok_masuk'); ?>">Stok Masuk</a>
                    </li>
                    <li>
                        <a href="<?= base_url('Stok_keluar'); ?>">Stok Keluar</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="<?= base_url('Transaksi'); ?>"><i class="fa fa-money fa-fw"></i> Transaksi</a>
            </li>

            <li>
                <a href="<?= base_url('Order'); ?>"><i class="fa fa-money fa-fw"></i> Order</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-book fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url('Laporan_penjualan'); ?>">Laporan Penjualan</a>
                    </li>
                    <li>
                        <a href="buttons.html">Laporan Stok Masuk</a>
                    </li>
                    <li>
                        <a href="notifications.html">Laporan Stok Keluar</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="blank.html">Blank Page</a>
                    </li>
                    <li>
                        <a href="login.html">Login Page</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
</div>
</nav>