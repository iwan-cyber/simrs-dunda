

const modaltarifrad = (tipe='show') => $('#modal').modal(tipe);

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
            
        modaltarifrad('hide');

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
    $('#3').val('');
    $('#2').val('');
    $('#1').val('');
    $('#VIP').val('');
    $('#VVIP').val('');
    $('#ICU').val('');
    $('#BPJS').val('');
    $('#BPJS_RI').val('');
    $('#KATEGORI').val('');
}

function edit(id) {

    let nama = $('#edit_'+id).attr('nama');
    let kelas_3 = $('#edit_'+id).attr('3');
    let kelas_2 = $('#edit_'+id).attr('2');
    let kelas_1 = $('#edit_'+id).attr('1');
    let vip = $('#edit_'+id).attr('vip');
    let vvip = $('#edit_'+id).attr('vvip');
    let icu = $('#edit_'+id).attr('icu');
    let bpjs = $('#edit_'+id).attr('bpjs');
    let bpjs_ri = $('#edit_'+id).attr('bpjs_ri');
    let kategori = $('#edit_'+id).attr('kategori');
    
    
    $('#ID').val(id);
    $('#NAMA_TINDAKAN').val(nama);
    $('#3').val(kelas_3);
    $('#2').val(kelas_2);
    $('#1').val(kelas_1);
    $('#VIP').val(vip);
    $('#VVIP').val(vvip);
    $('#ICU').val(icu);
    $('#BPJS').val(bpjs);
    $('#BPJS_RI').val(bpjs_ri);
    $('#KATEGORI').val(kategori);
    
   

    modaltarifrad();

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
            {width: "5%"},
            {width: "5%"},
            {width: "5%"},
            {width: "5%"},
            {width: "5%"},
            {width: "5%"},
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