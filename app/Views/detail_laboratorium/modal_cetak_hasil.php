<?php
function GetUmur($tgl_lahir)
{

    // ubah ke format Ke Date Time
    $lahir = new DateTime($tgl_lahir);
    $hari_ini = new DateTime();

    $diff = $hari_ini->diff($lahir);

    return  $diff->y . " Tahun" . " " . $diff->m . " Bulan" .  " " . $diff->d . " Hari";
}
$dataArr = json_decode($data);
foreach ($dataArr->data as $item) { ?>

    <div class="modal fade" id="ModalCetakHasil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-file-alt"></i> Cetak Hasil No: <?= $item->NOORDER; ?></h5>
                    <table>
                        <tr>
                            <td>
                                <button type="button" onclick="printDiv('print_01')" class="btn btn-sm btn-primary btn-block btn-cetak"><i class="ti-printer"></i> Cetak</button>
                            </td>
                            <td><button type="button" class="btn btn-sm btn-danger btn-blok pull-right" data-dismiss="modal">Batal</button></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-body bg-white my_print" id="print_01">
                    <table style="width: 100%;">
                        <tr>
                            <td class="text-center">
                                <font style="font-size: 20px; font-weight: bold;">INSTALASI LABORATORIUM PATOLOGI KLINIK</font><br />
                                <font style="font-size: 16px; font-weight: bold;">RSUD Dr. M.M DUNDA LIMBOTO</font><br />
                                <font style="font-size: 16px; font-weight: bold;">KABUPATEN GORONTALO</font><br />
                                Jl. Achmad A. Wahab No. 51 Telp (0435) 881455 Fax (0435) 881095
                            </td>
                        </tr>
                    </table>
                    <hr style="border-style: solid;">
                    <table style="width: 100%;">
                        <tr>
                            <td class="text-center">
                                <font style="font-size: 16px; font-weight: bold;">HASIL PEMERIKSAAN</font><br />
                                <font style="font-size: 12px;"><?= $item->NOORDER; ?></font><br />
                            </td>
                        </tr>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <table class="display" style="width: 100%;">
                                            <tr>
                                                <td style="font-weight: bold;">NOMR</td>
                                                <td style="font-weight: bold;">: <?= $item->NORM; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Pasien</td>
                                                <td style="font-weight: bold;">: <?= $item->NAMA; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>: <?= date('d F Y', strtotime($item->TGL_LAHIR)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>: <?php if ($item->JENKEL == 'l') {
                                                            echo "Laki-laki";
                                                        } else {
                                                            echo "Perempuan";
                                                        }; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Penjamin</td>
                                                <td>: <?= $item->PENJAMIN; ?> </td>
                                            </tr>
                                        </table>

                                    </td>
                                    <td>

                                        <table class="display" style="width: 100%;">
                                            <tr>
                                                <td>Dokter Pengirim</td>
                                                <td>: <?= $item->DOKTERPENGIRIM; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Departemen</td>
                                                <td>: RSUD Dr. M.M. Dunda Limboto </td>
                                            </tr>
                                            <tr>
                                                <td>Unit/Ruangan Asal</td>
                                                <td>: <?= $item->RUANGAN; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Tgl. Pengambilan Sampel</td>
                                                <td>: <?= date('d F Y', strtotime($item->TGLORDER)); ?> / <?= $item->JAMORDER; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Hasil</td>
                                                <td>: <?= date('d F Y', strtotime($item->HASILTGL)); ?> / <?= $item->HASILJAM; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <hr>
                            <h6 style="font-weight: bold;">Hasil Pemeriksaan:</h6>
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <table style="width: 100%;" class="" id="detailhasillab">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="font-weight: bold;">PEMERIKSAAN</th>
                                                    <th class="text-center" style="font-weight: bold;">HASIL</th>
                                                    <th class="text-center" style="font-weight: bold;">KELOMPOK</th>
                                                    <th class="text-center" style="font-weight: bold;">METODE</th>
                                                    <th class="text-center" style="font-weight: bold;">SATUAN</th>
                                                    <th class="text-center" style="font-weight: bold;">NILAI NORMAL</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <hr />
                        </div>
                        <div class="col-md-12">
                            <h6 style="font-weight: bold;">Kesan:</h6>
                            <p><?= $item->KESAN; ?></p>
                        </div>
                        <div class="col-md-12">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <center>
                                            <h6>Validator I</h6>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <h6 style="font-weight: bold;"><?= $item->VALIDI; ?></h6>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <h6>Validator II</h6>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <h6 style="font-weight: bold;"><?= $item->VALIDII; ?></h6>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-info">
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?= $item->NOORDER ?>" id="norder_labpk">
<?php } ?>

<script>
    function GetHapuspemeriksaanOrderById(IDORDER) {
        Swal.fire({
            title: 'Yakin ingin menghapus ?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('laboratoriumpk/HapusPemeriksaanOrderById') ?>",
                    data: {
                        idorder: IDORDER
                    },
                    dataType: "json",
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',

                        })
                        ListOrder(null, false);
                    }
                });

            }
        })
    }

    $(document).ready(function() {
        var getNoOrder = $('#norder_labpk').val();
        var groupColumn = 2;
        var table = $('#detailhasillab').DataTable({

            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "searching": false,
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            ajax: {
                url: '<?= base_url('Laboratoriumpk/DataHasilOrderByNorder'); ?>',
                data: {
                    noorderlpk: getNoOrder
                }
            },
            columns: [{
                    data: 'NAMAPEMERIKSAAN',
                    name: 'PEMERIKSAAN'

                }, {
                    data: 'HASIL',
                    name: 'HASIL',
                    class: 'text-center'

                }, {
                    data: 'SUBKELOMPOK',
                    name: 'SUBKELOMPOK'
                },
                {
                    data: 'METODE',
                    name: 'METODE'
                }, {
                    data: 'SATUAN',
                    name: 'SATUAN',
                    class: 'text-center'
                }, {
                    data: 'NILAI_NORMAL',
                    name: 'NILAI_NORMAL',
                    class: 'text-center'
                }
            ],

            "displayLength": 35,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group" style="background-color: #ddd;"><td colspan="6">' + group + '</td></tr>'
                        );

                        last = group;
                    }
                });
            },
        });


        ListOrder();
    });

    $('.formSimpanHasilOrderLabPk').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btn-simpan').attr('disable', 'disabled');
                $('.btn-simpan').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Menyimpan...');
            },
            complete: function() {
                $('.btn-simpan').removeAttr('disable', 'disabled');
                $('.btn-simpan').html('Simpan');
            },
            success: function(response, sukses) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: response.sukses,
                    icon: 'success'
                })
                // $('#modalOrderLabPk').modal('hide');
                // $('#torder_labpk').DataTable().ajax.reload(null, false);
            }
        });
        return false;
    })
</script>