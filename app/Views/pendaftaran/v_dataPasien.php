<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5><?= $title; ?></h5>
            <span class="text-info"><?= $subtitle; ?></span>
            <div class="card-header-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Data Pasien Lama</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-block">

            <div class="row">
                <div class="col-md-3">
                    <select class="form-control select2">
                        <option>[Filter Kecamatan]</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control select2">
                        <option>[Filter Jenis Kelamin]</option>
                    </select>
                </div>
            </div>
            <hr />
            <table id="dt-pasien" class="table table-striped table-bordered nowrap">
                <!-- <table id="dt-pasien" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%"> -->
                <thead>
                    <tr>
                        <th class="text-center">NOMR</th>
                        <th class="text-center">NAMA PASIEN</th>
                        <th class="text-center">TANGGAL LAHIR</th>
                        <th class="text-center">JENIS KELAMIN</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">ALAMAT</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="ModalDetailPasien" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 col-xl-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#profil" role="tab">Profile</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#riwayat" role="tab">Riwayat Pemeriksaan</a>
                            <div class="slide"></div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#berkas" role="tab">Berkas RM</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#detailKunjungan" role="tab">Detail Kunjungan</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="profil" role="tabpanel">
                            <h6 class="mt-3">Profile Pasien</h6>
                        </div>
                        <div class="tab-pane" id="riwayat" role="tabpanel">
                            <h6 class="mt-3">Riwayat Pemeriksaan</h6>
                        </div>
                        <div class="tab-pane" id="berkas" role="tabpanel">
                            <h6 class="mt-3">Berkas Rekam Medis (STATUS)</h6>
                        </div>
                        <div class="tab-pane" id="detailKunjungan" role="tabpanel">
                            <h6 class="mt-3">Riwayat Kunjungan!</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-mini waves-effect " data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Detail -->

<!-- Modal Ubah -->
<div class="modal fade" id="ModalUbahPasien" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> -- </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-mini waves-effect " data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-mini waves-effect waves-light ">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Ubah -->

<div class="tampilmodal"></div>

<script>
    function dataPasien() {
        $('#dt-pasien').DataTable({
            // searching: true,
            responsive: true,
            destroy: true,
            processing: true,
            serverSide: true,
            // orderMulti: false,
            ajax: {
                url: '<?= base_url('datapasien/TampilPasien'); ?>'
            },

            columns: [{
                    data: 'NOMR',
                    name: 'NOMR'
                }, {
                    data: 'NAMA',
                    name: 'NAMA'
                },
                {
                    data: 'TGLLAHIR',
                    name: 'TGLLAHIR'
                }, {
                    data: 'JENISKELAMIN',
                    name: 'JENISKELAMIN',

                }, {
                    data: 'NIP',
                    name: 'NIP'
                }, {
                    data: 'ALAMAT',
                    name: 'ALAMAT'
                }, {
                    data: 'aksi',
                    name: 'aksi'
                },
            ],
        });
    }

    function ubahData(id) {
        $('#ModalUbahPasien').modal('show');
    }

    function detailPasien(id) {
        $('#ModalDetailPasien').modal('show');
    }


    function daftarPasien(id) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url('pendaftaran/formpendaftaran'); ?>",
            data: {
                "id": id,
            },
            // dataType: 'json',
            success: function(response) {
                // if (response.sukses) {
                // console.log(response);
                $('.tampilmodal').html(response);
                $('#ModalPendaftaran').modal('show');
                /* menampilkan data dalam bentuk dokumen HTML */
                // }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);

            }
        });
    }

    $(document).ready(function() {
        dataPasien();

    })
</script>