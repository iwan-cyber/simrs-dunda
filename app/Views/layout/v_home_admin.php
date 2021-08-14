<div class="col-sm-12 m-l-0">
    <!-- List scroll card start -->
    <div class="card">
        <ul class="nav nav-tabs md-tabs" role="tablist">
            <li class="nav-item" style="color: aliceblue;">
                <a class="nav-link active show" data-toggle="tab" id="home1" href="#tabhome1" role="tab" aria-selected="true">Home</a>
                <div class="slide"></div>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content card-block">
            <div class="tab-pane active show" id="tabhome1" role="tabpanel">
                <div class="row card-block">
                    <div class="col-md-12 col-lg-4">
                        <div class="card-header">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <h5>Pendaftaran</h5>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm form-control-right" placeholder="Cari..">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <ul class="scroll-list cards ListAntriRajal">
                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card-header">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <h5>Pasien Mutasi</h5>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm form-control-right" placeholder="Cari..">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="scroll-list wave">
                            <table style="width: 100%;">
                                <tr>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card-header">
                            <h5>Antrian Resep Apotik</h5>
                            <div class="header-right">
                                <input type="text" class="form-control form-control-sm form-control-right" placeholder="Cari..">
                            </div>
                        </div>
                        <ul class="scroll-list flip">
                            <li>
                                <h6>Item1</h6>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card-header text-white" style="background-color: #8f41fb;">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <h5>Pasien Sedang Inap</h5>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm form-control-right" placeholder="Cari..">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <ul class="scroll-list helix ListPasienInap">
                        </ul>
                    </div>

                    <div class="col-md-12 col-lg-4">

                        <div class="card-header">
                            <h5>Antrian Lab. Anatomi</h5>
                            <div class="header-right">
                                <input type="text" class="form-control form-control-sm form-control-right" placeholder="Cari..">
                            </div>
                        </div>
                        <ul class="scroll-list twirl">
                            <li>
                                <h6>Item1</h6>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-4">

                        <div class="card-header">
                            <h5>Pasien Sedang Inap</h5>
                            <div class="header-right">
                                <input type="text" class="form-control form-control-sm form-control-right" placeholder="Cari..">
                            </div>
                        </div>
                        <ul class="scroll-list twirl">
                            <li>
                                <h6>Item1</h6>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
                var tutuptab = '<button class="btn btn-mini btn-danger pull-right" id="tutup' + NORM + '">x</button>';
                $(".nav-tabs").append(`<li class="nav-item" id="linkitem` + NORM + `">
                                            <a class="nav-link" id="nav-link` + NORM + `" data-toggle="tab" href="#tabs` + NORM + `" role="tab" aria-selected="true">
                                            <div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg"><button class="btn btn-mini btn-blok btn-info" onclick="tabsambildetail([` + NOPEN + `,` + NORM + `])">` + NORM + `</button> ` + tutuptab + `</div></a>
                                            <div class="slide"></div>
                                        </li>`);

                $(".tab-content").append(`<div class="tab-pane" id="tabs` + NORM + `" role="tabpanel"><div class="isitab` + NORM + `"></div></div>`);

                $(".nav-tabs li").removeClass("active show");
                $("#home1").removeClass("active show");
                $("#tabhome1").removeClass("active show");
                $("#nav-link" + NORM).addClass("active show");
                $("#tabs" + NORM).addClass("active show");


                $("#tutup" + NORM).bind("click", function() {
                    // activate the previous tab
                    $(this).parent().prev().addClass("active show");
                    $("#tabs" + NORM).prev().fadeIn('slow');

                    $(this).parent().remove();
                    $("#linkitem" + NORM).remove();
                    $("#tabs" + NORM).remove();
                    return false;
                });
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
        var tutuptab = '<button class="btn btn-mini btn-danger pull-right" id="tutup' + NORM + '">x</button>';
        $(".nav-tabs").append(`<li class="nav-item" id="linkitem` + NORM + `">
                                            <a class="nav-link" id="nav-link` + NORM + `" data-toggle="tab" href="#tabs` + NORM + `" role="tab" aria-selected="true">
                                            <div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg"><button class="btn btn-mini btn-blok btn-info" onclick="tabsambildetail([` + NOPEN + `,` + NORM + `])">` + NORM + `</button> ` + tutuptab + `</div></a>
                                            <div class="slide"></div>
                                        </li>`);

        $(".tab-content").append(`<div class="tab-pane" id="tabs` + NORM + `" role="tabpanel"><div class="isitab` + NORM + `"></div></div>`);

        $(".nav-tabs li").removeClass("active show");
        $("#home1").removeClass("active show");
        $("#tabhome1").removeClass("active show");
        $("#nav-link" + NORM).addClass("active show");
        $("#tabs" + NORM).addClass("active show");


        $("#tutup" + NORM).bind("click", function() {
            // activate the previous tab
            $(this).parent().prev().addClass("active show");
            $("#tabs" + NORM).prev().fadeIn('slow');

            $(this).parent().remove();
            $("#linkitem" + NORM).remove();
            $("#tabs" + NORM).remove();
            return false;
        });

        $.ajax({
            type: "post",
            url: "<?= base_url('rekammedis/detailpasien'); ?>",
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
    }

    function tabsambildetail([NOPEN, NOMR]) {

        $.ajax({
            type: "post",
            url: "<?= base_url('rekammedis/detailpasien'); ?>",
            data: {
                NOPEN: NOPEN,
                jampel: $('#jampelayanan').val(),
                tglpel: $('#tglPel').val(),
                sessionUser: $('#user_session').val()
            },
            success: function(response) {
                if (response) {
                    $('.isitab' + NOMR).html(response.data);

                }
            }
        });
    }

    $(document).ready(function() {
        listpendaftaran();
        listPasienSedangInap();
        // var auto_refresh = setInterval(
        //     function() {
        //         listPasienSedangInap();
        //     }, 1000); // refresh setiap 10000 milliseconds
    });
</script>