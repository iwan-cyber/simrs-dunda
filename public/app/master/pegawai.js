

const modalPegawai = (tipe='show') => $('#modal').modal(tipe);

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
            
        modalPegawai('hide');

    })

    .always(() => {
        reset()
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
    $('#NIK').val('');
    $('#NAMA_PEGAWAI').val('');
    $('#JENKEL').val('');
    $('#NIP').val('');
    $('#STATUS').val('');
}

function edit(id) {

    //ambil data edit
    let ruangan = $('#edit_'+id).attr('ruangan');
    let unit = $('#edit_'+id).attr('unit');

    //set data edit di modal
    $('#ID').val('');
    $('#NIK').val('');
    $('#NAMA_PEGAWAI').val('');
    $('#JENKEL').val('');
    $('#NIP').val('');
    $('#STATUS').val('');

    modalPegawai();

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
            {width: "15%"},
            {width: "60%"},
            {width: "5%"},
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