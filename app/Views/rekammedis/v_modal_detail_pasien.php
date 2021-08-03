<?php


$dataArr = json_decode($data);

foreach ($dataArr->data as $item) { ?>
    <div class="modal fade" id="modaldetailpasien" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pasien</h5>

                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button class="btn btn-out btn-sm waves-effect waves-light btn-primary btn-square"><i class="ti-check"></i> Final</button>
                        <button class="btn btn-out btn-sm waves-effect waves-light btn-danger btn-square"><i class="ti-close"></i> Batal</button>
                    </div>
                </div>

                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-mini waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-mini waves-effect waves-light btn-simpan">Daftarkan</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>