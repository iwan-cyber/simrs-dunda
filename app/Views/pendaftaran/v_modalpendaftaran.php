<?php


$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>
    <!-- Modal Pendaftaran -->
    <!-- <div class="modal fade" id="ModalPendaftaran" tabindex="-1" role="dialog"> -->
    <div class="modal fade" id="ModalPendaftaran" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $item->NOMR; ?> | <?= $item->NAMA; ?>, <?= $item->TITLE; ?></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('pendaftaran/simpanPendaftaran', ['class' => 'formpendaftarn']); ?>
                <div class="modal-body">

                    <h6 class="text-danger">[No. Pendaftaran]</h6>
                    <input type="text" value="PDUNDA-0001/07/2021.RJ-U" class="form-control form-control-sm input-danger" name="nopen" required>
                    <input type="hidden" value="<?= $item->NOMR; ?>" name="nomr" required readonly>
                    <input type="hidden" value="<?= $item->id; ?>" name="idpasien" required readonly>
                    <br />
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>
                                        <i class="ti-home"></i> Tujuan:
                                    </h5>
                                    <div class="card-header-right">
                                        <div class="form-check form-switch">
                                            <input class="border-checkbox border-checkbox-danger" type="checkbox" value="Y" id="cito" name="cito">
                                            <label class="border-checkbox-label text-danger" for="checkbox5">Cito ?</label>
                                            <input class="border-checkbox" type="checkbox" value="Y" id="resikojatuh" name="resikojatuh">
                                            <label class="border-checkbox-label text-danger" for="checkbox5">Resiko Jatuh ?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block widget-last-task">
                                    <table>
                                        <tr>
                                            <td>Pendaftaran</td>
                                            <td>
                                                <input type="date" id="tglpendaftaran" value="<?= date('Y-m-d'); ?>" name="tglpendaftaran" class="form-control form-control-sm input-danger" name="tglpendaftaran" id="tglpendaftaran" required>
                                            </td>
                                            <td>
                                                <input type="time" id="jampendaftran" name="jampendaftran" value="<?= date("H:i:s"); ?>" class="form-control form-control-sm input-danger" required>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-mini"><i class="ti-file"></i> Cetak General Consent</button>
                                            </td>
                                        </tr>
                                    </table>

                                    <table style="width: 100%;">
                                        <tr>
                                            <td colspan="2">
                                                <select class="form-control form-control-sm" id="instalasi" name="instalasi" required>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control form-control-sm" id="unitlayanan" name="unitlayanan" required>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control form-control-sm" id="ruangan" name="ruangan" required>
                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control select2 form-control-sm" id="smf" name="smf" required>
                                                    <option value="">[Pilih SFM]</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control select2 form-control-sm" id="dokterlayanan" name="dokterlayanan" required>
                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <select class="form-control form-control-sm" id="tarif" name="tarif" required>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <dic class="card">
                                <div class="card-header">
                                    <h5>
                                        <i class="ti-envelope"></i> Rujukan dari:
                                    </h5>
                                    <div class="card-header-right">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" data-toggle="toggle" id="cekrujukan">
                                            <label class="form-check-label" for="">Rujukan ?</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block widget-last-task" id="area-rujukan">

                                    <table style="width: 100%;">
                                        <tr>
                                            <td colspan="2">
                                                <div class="btn-group pull-right" role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">
                                                    <button type="button" class="btn btn-info btn-mini waves-effect waves-light"><i class="ti-arrow-down"></i> Ambil Sebelumnya</button>
                                                    <button type="button" class="btn btn-primary btn-mini waves-effect waves-light"><i class="ti-layers"></i> Baru</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <select class="form-control select2 form-control-sm" id="rujukan_ppk" name="rujukan_ppk" required>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="Nomor Surat Rujukan" name="rujukan_nomor" required>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control input-sm" placeholder="Tanggal rujukan" name="rujukan_tanggal" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="Nama Dokter" name="rujukan_dokter" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="S M F Dokter" name="rujukan_smf" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="Diagnosa masuk" name="rujukan_diagnosa" required>
                                            </td>
                                            <td>
                                                <select class="form-control select2 form-control-sm" id="rujukan_icd" name="rujukan_icd" required>
                                                    <option value="">Pilih</option>
                                                    <option value="1">contoh 1</option>
                                                    <option value="2">conto 2</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>
                                        <i class="ti-user"></i> Penjamin:
                                    </h5>
                                </div>
                                <div class="card-block widget-last-task">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>
                                                <select class="form-control select2 form-control-sm" id="penjamin" name="penjamin" required>
                                                    <option value="">[Pilih Penjamin]</option>
                                                    <option value="1">Tanpa Asuransi/Umum</option>
                                                    <option value="2">BPJS / JKN</option>
                                                </select>
                                            </td>

                                        </tr>
                                    </table>
                                    <div class="tampilinputpenjamin"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>
                                        <i class="ti-user"></i> Penanggung Jawab:
                                    </h5>
                                </div>
                                <div class="card-block widget-last-task">

                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-mini waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-mini waves-effect waves-light btn-simpan">Daftarkan</button>
                </div>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
    </div>
    <!-- END Modal Pendaftaran -->
<?php } ?>

<script>
    $(document).ready(function() {
        $('#area-rujukan *').prop('disabled', true);
    });

    $('#cekrujukan').change(function() {
        if ($(this).prop('checked')) {
            $('#area-rujukan *').prop('disabled', false);
        } else {
            $('#area-rujukan *').prop('disabled', true);
        }

    })


    function DataInstalsi() {
        $('#rujukan_icd').select2({
            theme: "classic",
            placeholder: '[ Masukkan / Pilih Kode ICD ]'
        });

        $('#instalasi').select2({
            onSelecting: true,
            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 1,
            allowClear: true,
            placeholder: '[ Pilih Instalasi Layanan ]',
            theme: "classic",
            selectOnClose: true,
            ajax: {
                dataType: 'json',
                url: '<?= base_url('masterdata/AmbilInstalasi') ?>',
                delay: 500,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                }


            }
        })

        $('#rujukan_ppk').select2({
            onSelecting: true,
            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 1,
            allowClear: true,
            placeholder: '[ Cari / Pilih nama P P K ]',
            theme: "classic",
            selectOnClose: true,
            ajax: {
                dataType: 'json',
                url: '<?= base_url('masterdata/AmbilPPK') ?>',
                delay: 500,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                }


            }
        })
    }

    function Datasmsf() {
        $('#smf').select2({
            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 1,
            allowClear: true,
            placeholder: '[ Pilih SMF ]',
            theme: "classic",
            selectOnClose: true,
            ajax: {
                dataType: 'json',
                url: '<?= base_url('masterdata/AmbilSmf') ?>',
                delay: 500,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                },
            }
        })
    }

    function Datatrif() {
        $('#tarif').select2({

            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 1,
            allowClear: true,
            placeholder: 'Silahkan pilih tarif layanan, tarif bisa dipilih lebih dari 1',
            theme: "classic",
            selectOnClose: true,
            ajax: {
                dataType: 'json',
                url: '<?= base_url('masterdata/AmbilTarif') ?>',
                delay: 500,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                },
            }
        })
    }

    // ketika id instalasi terjadi perubahan select
    $('#instalasi').change(function(e) {
        $.ajax({
            type: "post",
            url: "<?= base_url('masterdata/AmbilUnitLayanan') ?>",
            data: {
                instalasi: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('#unitlayanan').html(response.data)
                    $('#unitlayanan').select2({
                        dropdownParent: $('#ModalPendaftaran'),
                        theme: "classic",
                        selectOnClose: true,
                    })

                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('#unitlayanan').val(null).trigger('change');
                clearselect();
            }
        });
    })

    // ketika id unitlayanan terjadi perubahan select
    $('#unitlayanan').change(function(e) {
        $.ajax({
            type: "post",
            url: "<?= base_url('masterdata/AmbilRuangan') ?>",
            data: {
                unitlayanan: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('#ruangan').html(response.data)
                    $('#ruangan').select2({
                        dropdownParent: $('#ModalPendaftaran'),
                        theme: "classic",
                        selectOnClose: true,
                    })
                }
                Datasmsf(); //panggil data SMF ke select
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('#ruangan').val(null).trigger('change');

            }
        });
    })

    // ketika id unitlayanan terjadi perubahan select
    $('#smf').change(function(e) {
        $.ajax({
            type: "post",
            url: "<?= base_url('masterdata/AmbilDokterLayanan') ?>",
            data: {
                smf: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('#dokterlayanan').html(response.data)
                    $('#dokterlayanan').select2({
                        dropdownParent: $('#ModalPendaftaran'),
                        theme: "classic",
                        selectOnClose: true,
                    })
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('#dokterlayanan').val(null).trigger('change');
                $('#dokterlayanan').select2({
                    dropdownParent: $('#ModalPendaftaran'),
                    minimumInputLength: 2,
                    placeholder: '[ Dokter tidak ditemukan ]',
                    theme: "classic",
                })
            }
        });
    })

    $('#dokterlayanan').change(function(e) {
        Datatrif();
    })

    function clearselect() {
        $('#unitlayanan').select2({
            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 2,
            placeholder: '[ Pilih Layanan ]',
            theme: "classic",
        })
        $('#ruangan').select2({
            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 2,
            placeholder: '[ Pilih Ruangan ]',
            theme: "classic",
        })

        $('#smf').val(null).trigger('change');
        $('#smf').select2({

            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 2,
            allowClear: true,
            placeholder: '[ Pilih Smf ]',
            theme: "classic",
            selectOnClose: true,
        })
        $('#dokterlayanan').val(null).trigger('change');
        $('#dokterlayanan').select2({
            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 2,
            placeholder: '[ Pilih Dokter ]',
            theme: "classic",
        })
        $('#tarif').val(null).trigger('change');
        $('#tarif').select2({
            dropdownParent: $('#ModalPendaftaran'),
            minimumInputLength: 2,
            placeholder: '[ Pilih Tarif Layanan ]',
            theme: "classic",
        })

        $('#penjamin').select2()

    }

    $(document).ready(function() {
        DataInstalsi();
        $('#unitlayanan').select2({
            placeholder: '[ Pilih Unit Layanan ]',
            theme: "classic",
        })
        $('#ruangan').select2({
            placeholder: '[ Pilih Ruangan ]',
            theme: "classic",
        })
        $('#dokterlayanan').select2({
            placeholder: '[ Pilih Dokter ]',
            theme: "classic",
        })
        $('#smf').select2({
            placeholder: '[ Pilih SMF ]',
            theme: "classic",
        })
        $('#tarif').select2({
            placeholder: '[ Pilih Tarif Layanan ]',
            theme: "classic",
        })
        $('#penjamin').select2({
            placeholder: '[ Pilih Penjamin ]',
            theme: "classic",
        })

    })


    $('#penjamin').change(function(e) {

        var penjamin = $(this).val()
        if (penjamin != '2') { // pasien umum
            $('.tampilinputpenjamin').html(`
            <table style="width: 100%;">
                <tr>
                    <td><input type="text" class="form-control input-sm" placeholder="Nomor surat/kartu/nik penjamin" name="umum_nomor" required></td>
                    <td><input type="text" class="form-control input-sm" placeholder="Nama Penjamin" name="umum_nama" required></td>
                </tr>
                <tr>
                    <td><input type="text" class="form-control input-sm" placeholder="Alamat Penjamin" name="umum_alamat" required></td>
                    <td><input type="text" class="form-control input-sm" placeholder="Telepon/HP penjamin" name="umum_telp" required></td>
                </tr>
            </table>`)
        } else {
            $('.tampilinputpenjamin').html(`

                <table style="width: 100%;">
                    <tr>
                        <td><input type="text" class="form-control input-sm" placeholder="No. Kartu BPJS Penjamin" name="bpjs_nokartu" required></td>
                        <td>

                            <div class="btn-group pull-left" role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">
                                <button type="button" class="btn btn-info btn-mini waves-effect waves-light"><i class="ti-list"></i> Daftar Surat Rujukan</button>
                                <button type="button" class="btn btn-primary btn-mini waves-effect waves-light"><i class="ti-file"></i> Get SEP</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control input-sm" placeholder="Kelas hak" name="bpjs_kelashak" required></td>
                        <td><input type="text" class="form-control input-sm" placeholder="Jenis peserta" name="bpjs_jenis" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control input-sm" placeholder="No. Surat Eligibilitas Peserta (SEP)" name="bpjs_sep" required></td>
                        <td colspan="2"><input type="text" class="form-control input-sm" placeholder="Nomor SKDP" name="bpjs_skdp" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" class="form-control input-sm" placeholder="Pilih DPJP" name="bpjs_dpjp" required></td>
                    </tr>
                </table>`)
        }

    })

    $('.formpendaftarn').submit(function(e) {
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
            success: function(response) {
                Swal.fire(
                    'Terdaftar!',
                    'Proses telah berhasil dilakukan!',
                    'success'
                )
                $('#ModalPendaftaran').modal('hide');
            }
        });
        return false;
    })


    function infobed() {
        alert('ok')
    }
</script>