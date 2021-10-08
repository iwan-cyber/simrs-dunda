

const modalBed = (tipe='show') => $('#modal').modal(tipe);

var btnHapus = '';
var btnSimpan = new Tombol('#btnSimpan');

function simpan() {

    let kamar = $('#IDKAMAR').val();
    
    let simpandata = $.ajax(url+'/simpan', {
        dataType: 'json',
        type: 'POST',
        data: $('#form').serialize()+`&IDKAMAR=${kamar}`,
        beforeSend: () => btnSimpan.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
        }
        
        
        Msg.done(data.PESAN);
        getBed();
        
        modalBed('hide');

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
        getBed();        
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
    

    modalBed();

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

function getKamar() {

    let ruangan = $('#RUANGAN').val();

    let simpandata = $.ajax(url_ruangan+'/get/'+ruangan, {
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

function getBed() {

    let kamar = $('#IDKAMAR').val();

    let simpandata = $.ajax(url+'/get/'+kamar, {
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

        setBed(data.DATA);
        
    })

}



function setRuangan(dataRuangan)
{
    $('#RUANGAN').empty().append('<option value="">-- Pilih Ruangan --</option>');
    dataRuangan.forEach(function(ruangan){
        
        $('#RUANGAN').append(`<option value="${ruangan.ID}">${ruangan.RUANGAN}</option>`);

    });
}

function setKamar(dataKamar)
{
    $('#IDKAMAR').empty().append('<option value="">-- Pilih Kamar --</option>');
    dataKamar.forEach(function(kamar){
        
        $('#IDKAMAR').append(`<option value="${kamar.ID}">${kamar.NAMA_KAMAR}</option>`);

    });
}




function setBed(dataBed)
{
    $('#tbody-bed').empty();
    dataBed.forEach(function(bed){

        let data_bed = JSON.stringify(bed);
        
        let tombol = `<div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">`;

        let tombol_edit = `<button type="button" class="btn btn-info btn-mini waves-effect waves-light" id="edit_${bed.ID}" onclick="edit(${bed.ID})" data-bed='${data_bed}'><i class="ti-pencil"></i>Edit</button>`;
        let tombol_hapus = `<button type="button" class="btn btn-danger btn-mini waves-effect waves-light" id="hapus_${bed.ID}" onclick="konfirmasi_hapus(${bed.ID})"><i class="ti-close"></i>Hapus</button>`;

        let tombol_end = `</div>`;

        let rows = `<tr>
                        <td>${bed.ID}</td>
                        <td>${bed.KODE_BED}</td>
                        <td>${bed.NO_BED}</td>
                        <td>${tombol}${tombol_edit}${tombol_hapus}${tombol_end}</td>
                    </tr>`;

        $('#tbody-bed').append(`${rows}`);

    });

    $('#btnSimpan').show();

}

