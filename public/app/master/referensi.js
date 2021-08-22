

const modalRuangan = (tipe='show') => $('#modal').modal(tipe);

var tabel = '';
var btnHapus = '';
var btnRef = new Tombol('#btnRef');

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
            
        modalUnit('hide');

    })

    .always(() => reset());
        
}

function hapus(id) {

    let hapusdata = $.ajax(url+'/hapus/'+id, {
        dataType: 'json',
        type: 'POST',
        // beforeSend: () => btnHapus.loading('menghapus')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
        }
        else
        {
            Msg.done(data.PESAN);
            //tabel.ajax.reload();
        }
    })
}


function reset() {
    $('#ID').val('');
    $('#IDINSTALASI').val('');
    $('#NAMA_UNIT_LAYANAN').val('');
}

function edit(id) {

    //ambil data edit
    let ruangan = $('#edit_'+id).attr('ruangan');
    let unit = $('#edit_'+id).attr('unit');

    //set data edit di modal
    $('#ID').val(id);
    $('#RUANGAN').val(ruangan);
    $('#IDUNITLAYANAN').val(unit);

    modalRuangan();

}

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

function getDetail(referensi) {

    let simpandata = $.ajax(url+'/get/'+referensi, {
        dataType: 'json',
        type: 'POST',
        // beforeSend: () => btnSimpan.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
            return false;
        }

        // $('#IDINSTALASI').val(instalasi);
        setDetail(data.DATA);
        
    })

}

function getReferensi() {

    let simpandata = $.ajax(url+'/jenis', {
        dataType: 'json',
        type: 'POST',
        // beforeSend: () => btnSimpan.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
            return false;
        }

        setReferensi(data.DATA);
        
    })

}

$(document).ready(function() {
    getReferensi();
})


function setReferensi(dataReferensi)
{
    $('#list-referensi').empty();
    dataReferensi.forEach(function(referensi){
        $('#list-referensi').append(`<li onclick="getDetail(${referensi.ID})"><h6>${referensi.REFERENSI}</h6></li>`);
    });
}

function setDetail(dataDetail)
{
    $('#list-detail').empty();
    dataDetail.forEach(function(detail){

        $('#list-detail').append(`<li><h6>${detail.deskripsi}</h6></li>`);
    });
}

function simpan() {

    let simpandata = $.ajax(url+'/simpan', {
        dataType: 'json',
        type: 'POST',
        data: $('#form').serialize(),
        beforeSend: () => btnRef.loading('')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
            return false;
        }
        
            
    })

    .always(() => {
        btnRef.reset();
    });
        
}


function test() {
    alert('test');
}