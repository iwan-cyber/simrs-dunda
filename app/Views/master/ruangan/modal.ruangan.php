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