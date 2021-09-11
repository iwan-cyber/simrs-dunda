<h3>Radiologi</h3>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <div class="card-header-left">
                    <h5>PASIEN INTERNAL</h5>
                </div>
                <button class="btn btn-mini btn-primary">Order Baru</button>

            </div>
            <div class="card-block">
                <table class="table table-bordered table-hover nowarp" id="torder_radin" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>NO.REGISTER</th>
                            <th>NO.KUNJUNGAN</th>
                            <th>TGL.ORDER</th>
                            <th>JAM ORDER</th>
                            <th>DOK.PENGIRIM</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <div class="card-header-left">
                    <h5>PASIEN EXTERNAL</h5>
                </div>
                <button class="btn btn-mini btn-primary">Order Baru</button>

            </div>
            <div class="card-block">
                <table class="table table-bordered table-hover nowarp" id="torder_radex" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>NO.REGISTER</th>
                            <th>NO.KUNJUNGAN</th>
                            <th>TGL.ORDER</th>
                            <th>JAM ORDER</th>
                            <th>DOK.PENGIRIM</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#torder_radin').DataTable({
            responsive: true
        });

        $('#torder_radex').DataTable({
            responsive: true
        });
    });
</script>