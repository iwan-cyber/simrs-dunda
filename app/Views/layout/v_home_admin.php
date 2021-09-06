<div class="card">
    <div class="bg-info table-responsive">
        <table id="tb-tabs-dashboard">
            <tr>
                <td><button class="btn waves-effect waves-light btn-linkedin btn-sm btn-block btn-tab-dashboard" onclick="btnhomedashboard()"><i class="fas fa-home"></i></button></td>
            </tr>
        </table>
    </div>
    <div class="card-body">
        <div id="card-body"></div>
    </div>
</div>



<div class="viewmodal" style="display: none;"></div>
<script>
    function PanggilPasien([NOPEN, NORM]) {
        Swal.fire({
            html: `<div class="alert alert-info">
            <strong>Layanan Pasien Rawat Jalan!</strong>
        </div><label class="label label-info">NOMOR PENDAFTARAN</label><BR> <h5>` + NORM + `</h5>`,
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
                    url: "<?= base_url('rekammedis/penerimaanpasien'); ?>",
                    data: {
                        NOPEN: NOPEN,
                        jampel: $('#jampelayanan').val(),
                        tglpel: $('#tglPel').val(),
                        sessionUser: $('#user_session').val()
                    },
                    success: function(response) {
                        if (response) {
                            $('.isitab' + NORM).html(response);
                            listpendaftaran();
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
                    }
                });
            }
        })
    }

    function TerimaPasien([NOPEN, NORM]) {

        $nopen = NOPEN;
        Swal.fire({
            html: `<div class="alert alert-info">
            <strong>Layanan Pasien Rawat Inap!</strong>
        </div> <h5>` + $nopen + `</h5> <br> Ubah Bed ?`,

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
                    url: "<?= base_url('rekammedis/penerimaanpasien'); ?>",
                    data: {
                        NOPEN: NOPEN,
                        jampel: $('#jampelayanan').val(),
                        tglpel: $('#tglPel').val(),
                        sessionUser: $('#user_session').val()
                    },
                    success: function(response) {
                        if (response) {
                            $('.isitab' + NORM).html(response);
                            listpendaftaran();
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

                    }
                });

            }
        })
    }

    function listpendaftaran() {
        $.ajax({
            type: "GET",
            url: "<?= base_url('dashboard/listpendaftaran') ?>",
            dataType: "json",

            success: function(response) {
                $('.ListAntriRajal').html(response.data)
            },
            error: function(data) {
                $('.ListAntriRajal').html(data);
                console.log("error");
            }
        });
    }

    function listPasienSedangInap() {

        $.ajax({
            type: "GET",
            url: "<?= base_url('dashboard/listPasienSedangInap') ?>",
            dataType: "json",

            success: function(response) {
                $('.ListPasienInap').html(response.data)
            },
            error: function(data) {
                $('.ListPasienInap').html(data);
                console.log("error");
            }
        });
    }


    function lihatDetail([NOPEN, NORM]) {
        var hapusTab = '<a href="#" id="delCol' + NORM + '" class="text-danger">x</a>';
        var tableID = "tb-tabs-dashboard";
        var tblBodyObj = document.getElementById(tableID).tBodies[0];
        for (var i = 0; i < tblBodyObj.rows.length; i++) {
            var newCell = tblBodyObj.rows[i].insertCell(-1);
            newCell.innerHTML = "<div class=\"btn-group\" role=\"group\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\".btn-xlg\"><button class=\"btn waves-effect waves-light btn-linkedin btn-sm btn-tab-dashboard\" onclick=\"return tabsambildetail(['" + NOPEN + "','" + NORM + "'])\"><i class=\"fas fa-user-injured\"></i> " + NORM + " " + hapusTab + " </button></div>";
        }

        $('.btn-linkedin').click(function() {
            $('.btn-linkedin').removeClass('bg-danger');
            $(this).addClass('bg-danger');
        })

        $('#delCol' + NORM).click(function() {
            var tableID = "tb-tabs-dashboard";
            var allRows = document.getElementById(tableID).rows;
            for (var i = 0; i < allRows.length; i++) {
                if (allRows[i].cells.length > 1) {
                    allRows[i].deleteCell(-1);
                }
            }

            return false;
        });

        $.ajax({
            type: "post",
            url: "<?= base_url('rekammedis/detailpasien'); ?>",
            data: {
                NOPEN: NOPEN
            },
            success: function(response) {
                if (response) {
                    $("#card-body").html(response);
                }
            }
        });
    }


    function btnhomedashboard() {
        listpendaftaran();
        listPasienSedangInap();
        $('#card-body').html(`<div class=\"row card-block\">
                <div class=\"col-md-12 col-lg-4\">
                    <div class=\"card-header\">
                        <table style=\"width: 100%;\">
                            <tr>
                                <td>
                                    <h5>Pendaftaran</h5>
                                </td>
                                <td>
                                    <input type=\"text\" class=\"form-control form-control-sm form-control-right\" placeholder=\"Cari..\">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <ul class=\"scroll-list cards ListAntriRajal\">
                    </ul>
                </div>
                <div class=\"col-md-12 col-lg-4\">
                    <div class=\"card-header\">
                        <table style=\"width: 100%;\" id=\"tabs-dasboard\">
                            <tr>
                                <td>
                                    <h5>Pasien Mutasi</h5>
                                </td>
                                <td>
                                    <input type=\"text\" class=\"form-control form-control-sm form-control-right\" placeholder=\"Cari..\">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class=\"scroll-list wave\">
                        <table style=\"width: 100%;\">
                            <tr>

                            </tr>
                        </table>
                    </div>
                </div>
                <div class=\"col-md-12 col-lg-4\">
                    <div class=\"card-header\">
                        <h5>Antrian Resep Apotik</h5>
                        <div class=\"header-right\">
                            <input type=\"text\" class=\"form-control form-control-sm form-control-right\" placeholder=\"Cari..\">
                        </div>
                    </div>
                    <ul class=\"scroll-list flip\">
                        <li>
                            <h6>Item1</h6>
                        </li>
                    </ul>
                </div>
                <div class=\"col-md-12 col-lg-4\">
                    <div class=\"card-header\" style=\"background-color: #8f41fb;\">
                        <table style=\"width: 100%;\">
                            <tr>
                                <td>
                                    <h5 style=\"color: #ffffff;\">Pasien Sedang Inap</h5>
                                </td>
                                <td>
                                    <input type=\"text\" class=\"form-control form-control-sm form-control-right\" placeholder=\"Cari..\">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <ul class=\"scroll-list helix ListPasienInap\">
                    </ul>
                </div>

                <div class=\"col-md-12 col-lg-4\">

                    <div class=\"card-header\">
                        <h5>Antrian Lab. Anatomi</h5>
                        <div class=\"header-right\">
                            <input type=\"text\" class=\"form-control form-control-sm form-control-right\" placeholder=\"Cari..\">
                        </div>
                    </div>
                    <ul class=\"scroll-list twirl\">
                        <li>
                            <h6>Item1</h6>
                        </li>

                    </ul>
                </div>
                <div class=\"col-md-12 col-lg-4\">

                    <div class=\"card-header\">
                        <h5>Pasien Sedang Inap</h5>
                        <div class=\"header-right\">
                            <input type=\"text\" class=\"form-control form-control-sm form-control-right\" placeholder=\"Cari..\">
                        </div>
                    </div>
                    <ul class=\"scroll-list twirl\">
                        <li>
                            <h6>Item1</h6>
                        </li>

                    </ul>
                </div>
            </div>
    `);

    }

    $(document).ready(function() {

        listpendaftaran();
        listPasienSedangInap();
        btnhomedashboard();
        // $('.card-body-dashboard').hide();
        // dashboard();
        // var auto_refresh = setInterval(
        //     function() {
        //         listPasienSedangInap();
        //     }, 1000); // refresh setiap 10000 milliseconds
    });
</script>