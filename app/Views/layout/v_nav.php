<!-- Sidebar inner chat end-->
<div class="pcoded-main-container">
    <nav class="pcoded-navbar">
        <div class="pcoded-inner-navbar">
            <ul class="pcoded-item pcoded-left-item">

                <?php if (in_groups('admin')) : ?>
                    <!-- Master Data -->
                    <!-- Rawat Jalan -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">Rawat Jalan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Pasien Baru</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('datapasien/daftarRajal'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Pendaftaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Informasi Pendaftaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Informasi</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Rekapitulasi Jumlah Kunjungan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Detail Kunjungan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!-- UGD -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">UGD</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Pasien Baru</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('datapasien/daftarUgd'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Pendaftaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Informasi Pendaftaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Informasi</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Rekapitulasi Jumlah Kunjungan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Detail Kunjungan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!-- Rawat Inap -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">Rawat Inap</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="<?= base_url('datapasien/daftarInap'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Pendaftaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Cek Permintaan Inap</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Informasi Pendaftaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Informasi</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Rekapitulasi Jumlah Kunjungan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Detail Kunjungan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>                    

                    <!-- Rawat Inap -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">Kasir</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">                            
                            
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Kasir Rawat Jalan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Pembayaran Rawat Jalan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Data Pembayaran Rawat Jalan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>                            

                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Kasir Rawat Inap</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Pembayaran Rawat Inap</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Data Pembayaran Rawat Inap</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Laporan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                        </ul>
                    </li><!-- kasir -->


                    <!-- Penunjang -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">Penunjang</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Lab. Patologi Klinik</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Cek Oder</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Order baru</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Laporan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Lab Patologi Anatomi</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Cek Oder</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Order baru</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Laporan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Radiologi</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Cek Oder</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Order baru</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Laporan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                                <li class="">
                                    <a href="<?= base_url('farmasi'); ?>" class="waves-effect waves-dark">
                                        <span class="ti-hand-point-right"></span>
                                        <span>Gudang Farmasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="<?= base_url('barang'); ?>" class="waves-effect waves-dark">
                                        <span class="ti-hand-point-right"></span>
                                        <span>Gudang Barang</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>                                

                                <li class="">
                                    <a href="<?= base_url('apotik'); ?>" class="waves-effect waves-dark">
                                        <span class="ti-hand-point-right"></span>
                                        <span>Apotik</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>


                            <li class="">
                                <a href="<?= base_url(''); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>CSSD</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url(''); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>IPSRS</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <!-- Rekam medis -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">Rekam Medis</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="<?= base_url('rekammedis/cekpendaftaran'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Cek Pendaftaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Informasi</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Kunjungan Poli Klinik</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Kunjungan UGD</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Kunjungan Rawat Inap</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">

                        <!-- Page body start -->
                        <div class="page-body">
                            <div class="row m-t-40">