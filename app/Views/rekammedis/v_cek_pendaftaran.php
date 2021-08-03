<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Pasien Poli Interna</h5>
            <div class="card-header-right">
                <table>
                    <tr>
                        <td>Periode:</td>
                        <td>
                            <input type="date" id="tglpendaftaran" value="<?= date('Y-m-d'); ?>" name="tglpendaftaran" class="form-control form-control-sm" name="tglpendaftaran" id="tglpendaftaran" required>
                        </td>
                        <td>sampai</td>
                        <td>
                            <input type="date" id="tglpendaftaran" value="<?= date('Y-m-d'); ?>" name="tglpendaftaran" class="form-control form-control-sm" name="tglpendaftaran" id="tglpendaftaran" required>
                        </td>

                        <td>Status Pelayanan:</td>
                        <td>
                            <select class="form-select form-select-sm" id="statuspelayanan">
                                <!-- <option value="">Pilih Status</option> -->
                                <option value="all" selected>All</option>
                                <option value="1">Sedang Dilayani</option>
                                <option value="2">Sedang Antri</option>
                                <option value="3">Selesai</option>
                                <option value="4">Tidak Terlayani</option>
                            </select>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="card-block  ">
            <table id="dataPendaftaran" class="table table-striped table-bordered nowrap" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">STATUS PELAYANAN</th>
                        <th class="text-center">NO. PENDAFTARAN</th>
                        <th class="text-center">NO. MR</th>
                        <th class="text-center">NAMA PASIEN</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="viewmodal" style="display: none;"></div>
<script>
    function PanggilPasien(nopen) {

        Swal.fire({
            html: `<div class="alert alert-info">
                    <strong>Panggilan Nomor Pendaftaran!</strong>
                </div> <h5>` + nopen + `</h5>`,
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Layani`,
            denyButtonText: `Batalkan Pelayanan`,
            cancelButtonText: `Lewati Pelayanan`,
        }).then((result) => {
            /* Menerima atau pasien dilayani */
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('rekammedis/tampilModalRekamMedis'); ?>",
                    data: {
                        nopen: nopen,
                        jampel: $('#jampelayanan').val(),
                        tglpel: $('#tglPel').val(),
                        sessionUser: $('#user_session').val()
                    },
                    success: function(response) {
                        if (response) {
                            $('.viewmodal').html(response).show();
                            $('#modalrekammedis').modal('show');
                            $('#dataPendaftaran').DataTable().ajax.reload();
                        }

                    }
                });

            } else if (result.isDenied) { // membatalakan pendaftaran/kunjungan pasien
                $.ajax({
                    type: "post",
                    url: "<?= base_url('rekammedis/batalkanPendaftaran'); ?>",
                    data: {
                        nopen: nopen,
                        jampel: $('#jampelayanan').val(),
                        tglpel: $('#tglPel').val(),
                        sessionUser: $('#user_session').val()
                    },
                    // dataType: "json",
                    success: function(response) {

                        Swal.fire({
                            titel: 'Pembatalan Kunjungan!',
                            text: "Anda telah berhasil membatalkan kunjungan pasien tersebut!",
                            icon: 'success'
                        })

                        $('#dataPendaftaran').DataTable().ajax.reload();
                    }
                });

            }
        })

    }

    $(document).ready(function() {
        $('#dataPendaftaran').dataTable({
            oLanguage: {
                "sEmptyTable": "Data tidak ditemukan!",
                "sInfo": "Tampil _START_ - _END_ | Total data adalah: _TOTAL_ ",
                "sInfoEmpty": "Tampil 0 s/d 0 Hingga 0 Data",
                "sInfoFiltered": "(filtered from _MAX_ total Baris Data)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Tampilkan _MENU_ Baris Data",
                "sLoadingRecords": "Loading...",
                "sProcessing": "Reload data...",
                "sSearch": "Cari:",
                "sZeroRecords": "Data tidak ditemukan!",
            },
            sSearch: true,
            responsive: true,
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url('rekammedis/ambilDataPendaftaran'); ?>',
                data: function(d) {
                    d.status = $('#statuspelayanan').val();
                }
            },
            "order": [
                [0, "asc"]
            ],
            columns: [{
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'nopen',
                    name: 'nopen'
                }, {
                    data: 'norm',
                    name: 'norm'
                }, {
                    data: 'nama',
                    name: 'nama'
                }, {
                    data: 'action',
                    name: 'action'
                }
            ]
        });

        $('#statuspelayanan').change(function() {
            $('#dataPendaftaran').DataTable().ajax.reload();
        })
    });
</script>