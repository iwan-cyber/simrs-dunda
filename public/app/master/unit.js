

const modalUnit = (tipe='show') => $('#modal').modal(tipe);

var tabel = '';
var btnHapus = '';
var btnSimpan = new Tombol('#btnSimpan');

function simpan() {

    let instalasi = $('#IDINSTALASI').val();

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
            return false;
        }
        
        getUnit(instalasi);
        modalUnit('hide');

    })

    .always(() => {
     
        btnSimpan.reset();
        reset();

    });
        
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
            return false;
        }
        
        Msg.done(data.PESAN);

        $('#li_unit_'+id).remove();
        
       
    })
}


function reset() {
    
    $('#ID').val('');
    $('#NAMA_UNIT_LAYANAN').val('');
}

function edit(id) {

    let nama_unit = $('#edit_'+id).text();

    $('#ID').val(id);
    $('#NAMA_UNIT_LAYANAN').val(nama_unit);
    
    modalUnit();

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

function getUnit(instalasi) {

    $('#IDINSTALASI').val(instalasi);

    let simpandata = $.ajax(url_instalasi+'/get/'+instalasi, {
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

        $('#IDINSTALASI').val(instalasi);

        setUnit(data.DATA);
        
    })

}

function getInstalasi() {

    let simpandata = $.ajax(url_instalasi+'/register', {
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

        setInstalasi(data.DATA);
        
    })

}

$(document).ready(function() {
    getInstalasi();
})


function setInstalasi(dataInstalasi)
{
    $('#list-instalasi').empty();
    dataInstalasi.forEach(function(instalasi){
        $('#list-instalasi').append(`<li onclick="getUnit(${instalasi.ID})"><h6>${instalasi.INSTALASI}</h6></li>`);
    });
}

function setUnit(dataUnit)
{
    $('#list-unit').empty();
    dataUnit.forEach(function(unit){

        $('#list-unit').append(`<li id="li_unit_${unit.ID}"><h6><span id="edit_${unit.ID}" onclick="edit(${unit.ID})">${unit.NAMA_UNIT_LAYANAN}</span><span class="label label-danger float-right"  id="hapus_${unit.ID}" onclick="konfirmasi_hapus(${unit.ID})">hapus</span></h6></li>`);
    });
}

