<!-- Sidebar inner chat end-->
<div class="pcoded-main-container">
    <nav class="pcoded-navbar">
        <div class="pcoded-inner-navbar">
            <ul class="pcoded-item pcoded-left-item">

                <?php if (in_groups('admin')) : ?>
                    <!-- Seting Aplikasi -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">Seting Aplikasi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="<?= base_url('setingaplikasi/managemenUser'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Manajemen User</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('setingaplikasi/maneglayanan'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Manajemen Pelayanan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('setingaplikasi/pengaturanumum'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Pengaturan Umum</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('setingaplikasi/BridgingEktp'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Bridging e-KTP</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Layanan Mandiri</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/ambilAntrianLoket'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Kios-K Ambil Antrian</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Kios-K SEP</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Display Antrian Loket</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Display Antrian Poli</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Display Jadwal Dokter</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Display Info Ranap</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Bridging Kemkes</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Siranap</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Sisrute</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Sirs</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Bridging BPJS</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>SEP</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>INA-CBG's</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Mobile JKN</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- Master Data -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">Master Data</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Perbub Tarif</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Tindakan dan Tarif</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Spesialis (SFM)</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Jabatan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Golongan Darah</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('master/pekerjaan'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Pekerjaan</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('seting/seting1'); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Kelas</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Manajemen Pengguna</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Data Pengguna</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Modul Pengguna</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="pcoded-hasmenu ">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Ruangan dan Bed</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Jaminan</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= base_url('setingaplikasi/belumadamodul'); ?>" class="waves-effect waves-dark">
                                            <span class="ti-hand-point-right"></span>
                                            <span>Sub 1</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

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

                    <!-- Apotik -->
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-cta-right"></i><b>N</b></span>
                            <span class="pcoded-mtext">Apotik</span>
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
                                <a href="<?= base_url(''); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Gudang Farmasi</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?= base_url(''); ?>" class="waves-effect waves-dark">
                                    <span class="ti-hand-point-right"></span>
                                    <span>Gudang Umum</span>
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