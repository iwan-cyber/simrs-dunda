<link href="https://jonmiles.github.io/bootstrap-treeview/bower_components/bootstrap/dist/css/bootstrap.css">

<!-- Custom js -->
<!-- <script src="https://jonmiles.github.io/bootstrap-treeview/bower_components/jquery/dist/jquery.js"></script> -->
<!-- <script src="https://jonmiles.github.io/bootstrap-treeview/js/bootstrap-treeview.js"></script> -->
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5><?= $title; ?></h5>
            <span class="text-info"><?= $subtitle; ?></span>
            <div class="card-header-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!"><?= $title; ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-8">
                    daftar kamar
                </div>
                <div class="col-md-6 col-sm-12 col-lg-4">
                    <div class="card-header">
                        <h5>Ruangan</h5>
                    </div>
                    <div class="card-block">
                        <div id="listruangan" class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url('services/jsonkamar'); ?>",
            method: "POST",
            dataType: "json",
            success: function(data) {
                $('#listruangan').treeview({
                    data: data
                });
            }
        });

    });
</script>