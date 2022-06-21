<!-- Modal -->
<div class="modal fade" id="modal-pasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold;">Data Kunjungan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="data-pasien">
		<table class="table table-bordered table-striped table-sm table-hover">
			<thead>
				<tr>
					<th>NAMA</th>
					<th>Nomor</th>
					<th>Tanggal</th>
					<th>Ruangan</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="kunjungan"></tbody>
		</table>
      </div><!-- modal-body -->
      <div class="modal-footer"></div><!-- modal-footer -->
    </div>
  </div>
</div>