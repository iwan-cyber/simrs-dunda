<!-- Modal -->
<div class="modal fade" id="modalOrderLabPk" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="far fa-file"></i> Formulir Permintaan Laboratorium Patologi Klinik</h5>
                <table>
                    <tr>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary btn-block">Kirim</button>
                        </td>
                        <td><button type="button" class="btn btn-sm btn-danger btn-blok pull-right" data-dismiss="modal">Batal</button></td>
                    </tr>
                </table>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>DETAIL PASIEN</h5>
                            </div>
                            <div class="card-body table-responsive pad">
                                <table class="display">
                                    <tr>
                                        <td>NOMR</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>NAMA</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>TGL. LAHIR</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>UMUR / JENIS KELAMIN</td>
                                        <td>: </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>DOKTER DAN UNIT ASAL</h5>
                            </div>
                            <div class="card-body table-responsive pad">
                                <table class="display">
                                    <tr>
                                        <td>UNIT ASAL</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>NO. REGISTER</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>TANGGAL</td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>DOKTER PENGIRIM</td>
                                        <td>: </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>DAFTAR ORDER/PERMINTAAN</h5>
                            </div>
                            <div class="card-body myScroll">
                                <table class="table display" cellspacing="0" width="100%" id="tborderpk">
                                    <tbody class="tklabpk">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>DETAIL PERMINTAAN</h5>
                            </div>
                            <div class="card-body table-responsive pad">
                                <div class="pcoded-inner-content">
                                    <table>
                                        <tr id="tabs-kelompok">
                                        </tr>
                                    </table>
                                    </hr>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="cek"></div>

                </div>
            </div>
            <div class="modal-footer bg-info">

            </div>
        </div>

    </div>
</div>

<script>
    function btnkelompoklabpk(id_kelompok) {
        $('.tklabpk').append(`<tr id="baris_` + id_kelompok + `">
                                <td style="text-align: center;">No. Urut</td>
                                <td>Nama Kelompok Pemeriksaan` + id_kelompok + `</td>
                                <td style="text-align: center;">Status</td>
                                <td style="text-align: center;"><button class="btn btn-mini btn-danger" onclick="hapusOrderPK([` + id_kelompok + `])"><i class="fas fa-trash"></i></button></td>
                            </tr>`);


    }

    function hapusOrderPK([id_kelompok]) {
        $('#baris_' + id_kelompok).remove();
    };

    $(document).ready(function() {

        $.ajax({
            type: "post",
            url: "<?= base_url('Laboratoriumpk/datakelompok'); ?>",

            success: function(response) {
                $('#tabs-kelompok').html(response);
            }
        });
    });
</script>