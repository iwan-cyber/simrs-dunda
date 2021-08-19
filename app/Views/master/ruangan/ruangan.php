<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <h5>Data Card</h5>
            <span class="text-info">subtitle</span>
            <div class="card-header-right">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal">Tambah Data</button>
                    </div><!-- col-md-12 -->
                </div><!-- row -->
            </div>
        </div><!-- card-header -->

        <div class="card-block">

            <div class="row">
                <div class="col-md-12">

                    <div class="dt-responsive table-responsive">
                        <table class="table table-bordered compact dataTable table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>RUANGAN</th>
                                    <th>UNIT LAYANAN</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div><!-- col-md-12-->

            </div><!-- row -->

        </div><!-- card-block-->

    </div><!-- card -->
</div><!-- col-sm-12 -->


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form">
            <div class="form-group">
                <label for="ID_PEKERJAAN">ID Ruangan</label>
                <input type="text" class="form-control" id="ID" aria-describedby="id ruangan" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="RUANGAN">Nama Ruangan</label>
                <input type="text" class="form-control" id="RUANGAN" name="RUANGAN" placeholder="Ketik Nama Ruangan">
            </div>
            <div class="form-group">
                <label for="LAYANAN">Unit Layanan</label>
                <input type="text" class="form-control" id="LAYANAN" name="LAYANAN">
                    <option value=""> Pilih Unit Layanan</option>

            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
      </div>
    </div>
  </div>
</div>




<script>

const url = '<?= base_url('master/ruangan'); ?>'

const modalRuangan = (tipe='show') => $('#modal').modal(tipe);

var tabel = '';

function simpan() {

    let simpandata = $.ajax(url+'/simpan', {
        dataType: 'json',
        type: 'POST',
        data: $('#form').serialize()
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Pesan.error(data.PESAN);
        }
        else
        {
            Pesan.done(data.PESAN);
            tabel.ajax.reload();
        }
            
        // modalPekerjaan('hide');

    });
        
}

function register() {

   tabel = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: '<?= base_url('master/ruangan/data'); ?>'
        }
    });
}

$(document).ready(function() {
    register();
})

</script>
<script src="<?= base_url('app/master/ruangan.js?'.rand()); ?>"></script>