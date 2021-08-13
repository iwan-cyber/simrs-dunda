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
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Tambah Data</button>
                </div><!-- col-md-12 -->
            </div><!-- row -->

            <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table" id="table-pekerjaan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div><!-- col-md-12-->

            </div><!-- row -->
        </div><!-- card-block-->
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form">
            <div class="form-group">
                <label for="ID_PEKERJAAN">ID Pekerjaan</label>
                <input type="text" class="form-control" id="ID_PEKERJAAN" aria-describedby="id pekerjaan" placeholder="Otomatis" readonly="">
            </div>
            <div class="form-group">
                <label for="PEKERJAAN">Nama Pekerjaan</label>
                <input type="text" class="form-control" id="PEKERJAAN" name="PEKERJAAN" placeholder="Ketik Nama Pekerjaan">
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

const url = '<?= base_url('master/pekerjaan'); ?>'

const modalPekerjaan = (tipe='show') => $('#modal').modal(tipe);

var tabel_pekerjaan = '';

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
            tabel_pekerjaan.ajax.reload();
        }
            
        modalPekerjaan('hide');

    });
        
}

function dataPekerjaan() {

   tabel_pekerjaan = $('#table-pekerjaan').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: '<?= base_url('master/pekerjaan/data'); ?>'
        },
        columns: [
            {
                data: 'ID',
                name: 'ID'
            }, 
            {
                data: 'PEKERJAAN',
                name: 'PEKERJAAN'
            }
        ],
    });
}

$(document).ready(function() {
    dataPekerjaan();
})

</script>