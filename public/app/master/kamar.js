
$('document').ready(function() {

    $('select').select2();

});


const modalKamar = (tipe='show') => $('#modal').modal(tipe);

var btnHapus = '';
var btnSimpan = new Tombol('#btnSimpan');

function simpan() {

    let ruangan = $('#RUANGAN').val();
    
    let simpandata = $.ajax(url+'/simpan', {
        dataType: 'json',
        type: 'POST',
        data: $('#form').serialize()+`&ID_RUANGAN=${ruangan}`,
        beforeSend: () => btnSimpan.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
        }
        
        
        Msg.done(data.PESAN);
        getKamar();
        
        modalKamar('hide');

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
        
        Msg.done(data.PESAN);
        getKamar();        
    })

    .always(() => btnHapus = '')
        
}


function reset() {
    $('#ID').val('');
    $('#INSTALASI').val('');
}

function edit(id) {

    let instalasi = $('#edit_'+id).attr('instalasi');
    
    $('#ID').val(id);
    $('#INSTALASI').val(instalasi);
    

    modalKamar();

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

function getRuangan() {

    let unit = $('#UNIT').val();

    let simpandata = $.ajax(url_unit+'/get/'+unit, {
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
        setRuangan(data.DATA);
        
    })

}

function setRuangan(dataRuangan)
{
    $('#RUANGAN').empty().append('<option value="">-- Pilih Ruangan --</option>');
    dataRuangan.forEach(function(ruangan){
        
        $('#RUANGAN').append(`<option value="${ruangan.ID}">${ruangan.RUANGAN}</option>`);

    });
}

function getKamar() {

    let ruangan = $('#RUANGAN').val();

    let simpandata = $.ajax(url+'/get/'+ruangan, {
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

        setKamar(data.DATA);
        
    })

}


function setKamar(dataKamar)
{
    $('#tbody-kamar').empty();
    dataKamar.forEach(function(kamar){

        let data_kamar = JSON.stringify(kamar);
        
        let tombol = `<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">`;

        let tombol_edit = `<button type="button" class="btn btn-info btn-mini waves-effect waves-light" id="edit_${kamar.ID}" onclick="edit(${kamar.ID})" data-kamar='${data_kamar}'><i class="ti-close"></i>Edit</button>`;
        let tombol_hapus = `<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" id="hapus_${kamar.ID}" onclick="konfirmasi_hapus(${kamar.ID})"><i class="ti-pencil"></i>Hapus</button>`;

        let tombol_end = `</div>`;

        let rows = `<tr>
                        <td>${kamar.ID}</td>
                        <td>${kamar.KODE}</td>
                        <td>${kamar.NAMA_KAMAR}</td>
                        <td>${kamar.KELAS}</td>
                        <td>${tombol}${tombol_edit}${tombol_hapus}${tombol_end}</td>
                    </tr>`;

        $('#tbody-kamar').append(`${rows}`);

    });

    $('#btnSimpan').toggle();


}

