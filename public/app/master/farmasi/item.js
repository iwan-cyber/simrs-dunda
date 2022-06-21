

const modalItem = (tipe='show') => $('#modal').modal(tipe);

var tabel = '';
var btnHapus = '';
var btnSimpan = new Tombol('#btnSimpan');

function simpan() {

    let simpandata = $.ajax(url+'/simpan', {
        dataType: 'json',
        type: 'POST',
        data: $('#form').serialize(),
        beforeSend: () => btnSimpan.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
        }
        else
        {
            Msg.done(data.PESAN);
            tabel.ajax.reload();
        }
            
        modalItem('hide');

    })

    .always(() => {
        reset();
        btnSimpan.reset();
    });
        
}

function hapus(id) {

    let hapusdata = $.ajax(url+'/hapus/'+id, {
        dataType: 'json',
        type: 'POST',
        beforeSend: () => btnHapus.loading('menghapus')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
        }
        else
        {
            Msg.done(data.PESAN);
            tabel.ajax.reload();
        }
    })

    .always(() => btnHapus = '')
        
}


function reset() {
    $('#ID').val('');
    $('#KODE_ITEM').val('');
    $('#NAMA_ITEM').val('');
    $('#SAT_BESAR').val('');
    $('#SAT_KECIL').val('');
    $('#FRAC').val('');
    $('#JENIS').val('');
    $('#GOLONGAN').val('');
}

function edit(id) {

    let kode_item = $('#edit_'+id).attr('kode');
    let nama_item = $('#edit_'+id).attr('nama');
    let sat_besar = $('#edit_'+id).attr('besar');
    let sat_kecil = $('#edit_'+id).attr('kecil');
    let frac = $('#edit_'+id).attr('frac');
    let golongan = $('#edit_'+id).attr('golongan');
    let jenis = $('#edit_'+id).attr('jenis');
    
    $('#ID').val(id);
    $('#KODE_ITEM').val(kode_item);
    $('#NAMA_ITEM').val(nama_item);
    $('#SAT_BESAR').val(sat_besar);
    $('#SAT_KECIL').val(sat_kecil);
    $('#FRAC').val(frac);
    $('#GOLONGAN').val(golongan);
    $('#JENIS').val(jenis);
    

    modalItem();

}

function register() {

   tabel = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: url+'/data'
        },
        columns: [
            {width: "5%"},
            {width: "30%"},
            {width: "10%"},
            {width: "10%"},
            {width: "10%"},
            {width: "10%"},
            {width: "10%"},
            {width: "15%"},
        ]

    });
}

$(document).ready(function() {
    register();
})

var konfirmasi_hapus = (id) => {

    $.confirm({
        title: 'Konfirmasi',
        content: `Apakah Anda Ingin Menghapus data ini ?`,
        buttons: {
            Hapus: {
                btnClass: 'btn-blue',
                keys: ['enter'],
                action: () => {
                    btnHapus = new Tombol('#hapus_'+id);
                    hapus(id);
                }
            },
            Batal: {
                btnClass: 'btn-red',
                keys: ['esc']
            }
        }
    });

} 


$('#modal').on('hidden.bs.modal', function (event) {
  reset();
})