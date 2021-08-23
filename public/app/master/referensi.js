const modalRef = (tipe='show') => $('#modal').modal(tipe);

var tabel = '';
var btnHapus = '';
var btnRef = new Tombol('#btnRef');

Ref = {
    ID: '',
    REFERENSI: ''
};

$(document).ready(function() {
    Ref.get();
})


Ref.simpan = () => {

    Ref.ID = $('#ID').val();
    Ref.REFERENSI = $('#REFERENSI').val();

    let simpandata = $.ajax(url+'/simpan', {
        dataType: 'json',
        type: 'POST',
        data: {
            ID: Ref.ID,
            REFERENSI: Ref.REFERENSI

        },
        beforeSend: () => btnRef.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.err(data.PESAN);
            return false;
        }
        
        if(Ref.ID === '')
            Ref.tambah_list(data.DATA);
        else 
            Ref.update_list(Ref.ID);


        modalRef('hide');
        
    })

    .always(() => {
        btnRef.reset();
        Ref.reset();
    });
}

Ref.tambah_list = (id) => {

    $('#list-referensi').append(`<li id="li_referensi_${id}"><h6><span id="edit_${id}" onclick="RefDetail.get(${id})" ondblclick="Ref.edit(${id})">${Ref.REFERENSI}</span><span class="label label-danger float-right"  id="hapus_${id}" onclick="konfirmasi_hapus(${id})">hapus</span></h6></li>`);
}

Ref.update_list = (id) => $('#edit_'+id).text(Ref.REFERENSI)

Ref.hapus = (id) => {

    let hapusdata = $.ajax(url+'/hapus/'+id, {
        dataType: 'json',
        type: 'POST',
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.err(data.PESAN);
            return false;
        }
        
        Msg.done(data.PESAN);
        Ref.hapus_list(id);
               
    })


}

Ref.reset = () => {

    Ref.ID = '';
    Ref.REFERENSI = '';

    $('#ID').val('');
    $('#REFERENSI').val('');
    

}

Ref.get = () => {

    let simpandata = $.ajax(url+'/get', {
        dataType: 'json',
        type: 'POST',
        // beforeSend: () => btnSimpan.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.err(data.PESAN);
            return false;
        }

        $('#list-referensi').empty();
        data.DATA.forEach(function(referensi){
            $('#list-referensi').append(`<li id="li_referensi_${referensi.ID}"><h6><span id="edit_${referensi.ID}" onclick="RefDetail.get(${referensi.ID})" ondblclick="Ref.edit(${referensi.ID})">${referensi.REFERENSI}</span><span class="label label-danger float-right"  id="hapus_${referensi.ID}" onclick="konfirmasi_hapus(${referensi.ID})">hapus</span></h6></li>`);
        });
        
    })
}



Ref.hapus_list = id => $('#li_referensi_'+id).remove();

Ref.edit = id => {

    //getter
    Ref.REFERENSI =  $('#edit_'+id).text();
    Ref.ID = id;

    //setter
    $('#ID').val(id);
    $('#REFERENSI').val(Ref.REFERENSI);
    
    modalRef();

}

var konfirmasi_hapus = id => {

    $.confirm({
        title: 'Konfirmasi',
        content: `Apakah Anda Ingin Menghapus data ini ?`,
        buttons: {
            Hapus: {
                btnClass: 'btn-blue',
                keys: ['enter'],
                action: () => {
                    btnHapus = new Tombol('#hapus_'+id);
                    Ref.hapus(id);
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
  Ref.reset();
})