<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar">
        <ul class="pcoded-item pcoded-left-item">
                    <!-- Seting Aplikasi -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">BARANG MASUK</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="<?= base_url('gudang/barangmasuk'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Tambah Barang Masuk</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('gudang/barangmasuk/register'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Data Barang Masuk</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>             

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext">BARANG KELUAR</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    
                    <li class="">
                        <a href="<?= base_url('gudang/barangkeluar'); ?>" class="waves-effect waves-dark">
                            <i class="ti-agenda"></i> Tambah Barang Keluar
                        </a>
                    </li>

                    <li class="">
                        <a href="<?= base_url('gudang/barangkeluar/register'); ?>" class="waves-effect waves-dark">
                            <i class="ti-agenda"></i> Data Barang Keluar
                        </a>
                    </li>

                </ul>
            </li>                 

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext">INFORMASI</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="<?= base_url('gudang/stock'); ?>" class="waves-effect waves-dark">
                            <i class="ti-agenda"></i> STOCK
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url('gudang/saldo'); ?>" class="waves-effect waves-dark">
                            <i class="ti-agenda"></i> SALDO
                        </a>
                    </li>
                    <li class="">
                        <a href="<?= base_url('gudang/mutasi'); ?>" class="waves-effect waves-dark">
                            <i class="ti-agenda"></i> MUTASI
                        </a>
                    </li>
                </ul>
            </li>                            

            <li class="pcoded-hasmenu">
                <a href="<?= base_url('gudang/laporan'); ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                    <span class="pcoded-mtext">LAPORAN</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>            

        </ul>
    </div>
</nav>