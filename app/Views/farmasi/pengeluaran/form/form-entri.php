<form id="form-entrian">

    <input type="hidden" id="BATCH" name="BATCH">
    <input type="hidden" id="TGL_EXPIRE" name="TGL_EXPIRE">
    <input type="hidden" id="HARGA" name="HARGA">

<div class="row">



    <div class="form-group col-10">
        <label for="CARI">Nama Item</label>
        <input type="text" id="CARI" name="CARI" class="form-control form-control-sm entrian isian"
            placeholder="Ketik Nama Item untuk mencari" data-toogle="tooltips" data-placement="bottom" title="Ketik nama item minimal 3 huruf depan">
        <!--select class="form-control form-control-sm  entrian isian select2" id="CARI" name="CARI">
            <?php //echo load_obat($connect, 'gdu'); ?>
        </select-->
    </div>


    <div class="form-group col-2">
        <label for="STOCK">Stock</label>
        <input type="text" class="form-control form-control-sm entrian isian" id="STOCK" name="STOCK" placeholder="stock item">
    </div>


</div>

<div class="row">



    <div class="form-group col-2">
        <label for="JUMLAH_BESAR">Jml Besar</label>
        <input type="number" class="form-control form-control-sm" id="JUMLAH_BESAR" name="JUMLAH_BESAR" onchange="entrian.hitungIsi()" value="0" placeholder="Jumlah Besar">
    </div>

    <div class="form-group col-2">
        <label for="SAT_BESAR">Sat.Besar</label>
        <input type="text" class="form-control form-control-sm entrian isian" id="SAT_BESAR" name="SAT_BESAR" placeholder="satuan besar">
    </div>

    <div class="form-group col-2">
        <label for="ISI">Isi/Frac</label>
        <input type="number" class="form-control form-control-sm entrian isian" id="ISI" name="ISI" onchange="entrian.hitungIsi()" value="1" placeholder="ketik isi ">
    </div>

    <div class="form-group col-2">
        <label for="JUMLAH">Total Keluar</label>
        <input type="jumlah" class="form-control form-control-sm" id="JUMLAH" name="JUMLAH" value="0" placeholder="Jumlah yang keluar ke unit">
    </div>

    <div class="form-group col-2">
        <label for="SAT_KECIL">Sat Kecil</label>
        <select class="form-control form-control-sm  entrian isian" id="SAT_KECIL" name="SAT_KECIL">
            <?php //echo getSatuan($connect, 2); ?>
        </select>
    </div>

    <div class="form-group col-2">
        <label for="#" style="color: white">#</label>
        <button type="button" class="btn btn-primary btn-block btn-sm" id="btnadd" onclick="add()">
            <i class="fas fa-plus"></i> Tambah
        </button>
    </div>


</div>
</form>

