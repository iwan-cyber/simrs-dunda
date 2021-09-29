

const modalujites = (tipe='show') => $('#modal').modal(tipe);

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
            
        modalujites('hide');

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
    $('#ID_UJI').val('');
    $('#UJI_TES').val('');
    $('#SATUAN').val('');
    $('#NILAI_NORMAL').val('');
    $('#URUTAN').val('');
    $('#ID_KELOMPOK').val('');
    $('#ID_SUB').val('');
}

function edit(id) {

    let uji = $('#edit_'+id).attr('uji');
    let satuan = $('#edit_'+id).attr('satuan');
    let nilai = $('#edit_'+id).attr('nilai');
    let urutan = $('#edit_'+id).attr('urutan');
    let kelompok = $('#edit_'+id).attr('kelompok');
    let sub = $('#edit_'+id).attr('sub');
    
    $('#ID_UJI').val(id);
    $('#UJI_TES').val(uji);
    $('#SATUAN').val(satuan);
    $('#NILAI_NORMAL').val(nilai);
    $('#URUTAN').val(urutan);
    $('#ID_KELOMPOK').val(kelompok);
    $('#ID_SUB').val(sub);
   

    modalujites();

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
            {width: "25%"},
            {width: "10%"},
            {width: "10%"},
            {width: "5%"},
            {width: "5%"},
            {width: "5%"},
            {width: "10%"},
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