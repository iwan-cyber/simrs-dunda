<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search waves-effect waves-light">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                            <input class="form-control" id="inputseacrh" autocomplete="off" placeholder="NOMR atau Nama Pasien">
                            <span class="input-group-append search-btn waves-effect waves-light" data-toggle="toltip" data-placement="bottom" toltip="Cari pasien: Masukkan nomor mr atau nama" title="Cari pasien: Masukkan NOMR atau Nama"><i class="ti-list input-group-text"></i></span>
                            <ul id="suggesstion-box"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url() ?>">
                <!-- <img class="img-fluid" src="<?= base_url() ?>/template/files/assets/images/logo.png" alt="Theme-Logo" /> -->
                <h5>SIMRS DUNDA</h5>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                            <input class="form-control" id="inputseacrh" placeholder="NOMR atau Nama Pasien">
                            <span class="input-group-append search-btn waves-effect waves-light" data-toggle="toltip" data-placement="bottom" toltip="Cari pasien: Masukkan nomor mr atau nama" title="Cari pasien: Masukkan NOMR atau Nama"><i class="ti-list input-group-text"></i></span>
                        </div>

                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <a href="#!" class="waves-effect waves-light">
                        <i class="ti-bell"></i>
                        <span class="badge bg-c-red"></span>
                    </a>
                    <ul class="scroll-list show-notification">
                        <li>
                            <h6>Pasien Control</h6>
                            <label class="label label-danger">1</label>
                        </li>
                        <li class="waves-effect waves-light">
                            <div class="media">
                                <img class="d-flex align-self-center img-radius" src="<?= base_url() ?>/template/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>
                                                <h5 class="notification-user">0000 | Iwan Maksud</h5>
                                                <p class="notification-msg">Asal: Poli Interna </p>
                                                <span class="notification-time">30:00 Wita - 01-01-2021</span>
                                            </td>
                                            <td>
                                                <h5>Layani</h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>

                    </ul>
                </li>
                <li class="">
                    <a href="#!" class="displayChatbox waves-effect waves-light" title="Data pasien">
                        <i class="ti-user"></i>
                        <span class="badge bg-c-green"></span>
                    </a>
                </li>
                <li class="user-profile header-notification">
                    <a href="#!" class="waves-effect waves-light">
                        <img src="<?= base_url() ?>/template/files/assets/images/logo-pemda.jpg" class="img-radius" alt="User-Profile-Image">
                        <span><?= user()->fullname; ?></span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li class="waves-effect waves-light">
                            <a href="#!">
                                <i class="ti-settings"></i> Settings
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="user-profile.html">
                                <i class="ti-user"></i> Profile
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="email-inbox.html">
                                <i class="ti-email"></i> My Messages
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="auth-lock-screen.html">
                                <i class="ti-lock"></i> Lock Screen
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="<?= base_url('logout'); ?>">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Sidebar chat start -->
<div id="sidebar" class="users p-chat-user showChat">
    <div class="had-container">
        <div class="card card_main p-fixed users-main">
            <div class="user-box">
                <div class="card-header">
                    <h5>Cari Pasien</h5>
                    <i class="ti-angle-double-right back_friendlist"></i>
                </div>

                <div class="main-friend-list">
                    <table id="tpasiensearch" class="table table-striped table-bordered nowrap" style="width: 100%;">
                        <!-- <table id="dt-pasien" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%"> -->
                        <thead>
                            <tr>
                                <th class="text-center">PASIEN</th>
                                <!-- <th class="text-center">#</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>

                <script type="text/javascript">
                    // AJAX call for autocomplete 
                    function tabsPanggilPasienPOli([NOPEN, NORM]) {
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
                            url: "<?= base_url('rekammedis/penerimaanpasien'); ?>",
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


                    $(document).ready(function() {

                        $('#tpasiensearch').DataTable({

                            // responsive: true,
                            destroy: true,
                            processing: true,
                            serverSide: true,
                            orderMulti: false,
                            ajax: {
                                url: '<?= base_url('dashboard/listpasienpolilayani'); ?>'
                            },

                            columns: [{
                                data: 'NAMA',
                                name: 'NAMA'
                            }],
                        });

                    });
                </script>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar inner chat start-->
<div class="showChat_inner">
    <div class="media chat-inner-header">
        <a class="back_chatBox">
            <i class="fa fa-chevron-left"></i> Josephin Doe
        </a>
    </div>
    <div class="media chat-messages">
        <a class="media-left photo-table" href="#!">
            <img class="media-object img-radius img-radius m-t-5" src="<?= base_url() ?>/template/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
        </a>
        <div class="media-body chat-menu-content">
            <div class="">
                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                <p class="chat-time">8:20 a.m.</p>
            </div>
        </div>
    </div>
    <div class="media chat-messages">
        <div class="media-body chat-menu-reply">
            <div class="">
                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                <p class="chat-time">8:20 a.m.</p>
            </div>
        </div>
        <div class="media-right photo-table">
            <a href="#!">
                <img class="media-object img-radius img-radius m-t-5" src="<?= base_url() ?>/template/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
            </a>
        </div>
    </div>
    <div class="chat-reply-box">
        <div class="right-icon-control">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Share Your Thoughts</label>
                </div>
            </form>
            <div class="form-icon ">
                <button class="btn btn-success btn-icon  waves-effect waves-light">
                    <i class="fa fa-paper-plane "></i>
                </button>
            </div>
        </div>
    </div>
</div>