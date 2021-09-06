const modalDetail = (tipe='show') => $('#modal-detail').modal(tipe);

var tabel = '';
var btnHapus = '';
var btnRefDetail = new Tombol('#btnRefDetail');

RefDetail = {
    ID: '',
    ID_REFERENSI: '',
    DESKRIPSI: ''
};

RefDetail.simpan = () => {

    if(RefDetail.ID_REFERENSI === '') {
        Msg.err('Pilih Referensi dulu');
        return false;
    } 


    RefDetail.ID = $('#ID').val();
    RefDetail.ID_REFERENSI = $('#ID_REFERENSI').val();
    RefDetail.DESKRIPSI = $('#DESKRIPSI').val();

    let simpandata = $.ajax(url+'/detail/simpan', {
        dataType: 'json',
        type: 'POST',
        data: {
            ID: Ref.ID,
            ID_REFERENSI: RefDetail.ID_REFERENSI,
            DESKRIPSI: RefDetail.DESKRIPSI
        },
        beforeSend: () => btnRefDetail.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.err(data.PESAN);
            return false;
        }
        
        if(RefDetail.ID === '')
            RefDetail.tambah_list(data.DATA);
        else 
            RefDetail.update_list(RefDetail.ID);

        modalDetail('hide');

    })

    .always(() => {
        btnRefDetail.reset();
        RefDetail.reset();
    });
}

RefDetail.tambah_list = (id) => {

    $('#list-detail').append(`<li id="li_detail_${id}"><h6><span id="edit_detail_${id}" ondblclick="RefDetail.edit(${id})">${RefDetail.DESKRIPSI}</span><span class="label label-danger float-right"  id="hapus_detail_${id}" onclick="konfirmasi_hapus_detail(${id})">hapus</span></h6></li>`);    
}

RefDetail.update_list = (id) => $('#edit_detail_'+id).text(RefDetail.DESKRIPSI)


RefDetail.hapus = id => {

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
        RefDetail.hapus_list(id);
               
    })


}

RefDetail.hapus_list = (id) => $('#li_detail_'+id).remove();

RefDetail.reset = () => {

    RefDetail.ID = '';
    RefDetail.DESKRIPSI = '';

    $('#ID_DETAIL').val('');
    $('#DESKRIPSI').val('');
    

}

RefDetail.get = (id) => {

    RefDetail.ID_REFERENSI = id;
    $('#ID_REFERENSI').val(id);

    let simpandata = $.ajax(url+'/detail/get/'+id, {
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

        $('#list-detail').empty();
        data.DATA.forEach(function(detail){
            $('#list-detail').append(`<li id="li_detail_${detail.ID}"><h6><span id="edit_detail_${detail.ID}" ondblclick="RefDetail.edit(${detail.ID})">${detail.DESKRIPSI}</span><span class="label label-danger float-right"  id="hapus_detail_${detail.ID}" onclick="konfirmasi_hapus_detail(${detail.ID})">hapus</span></h6></li>`);
        });
        
    })
}



RefDetail.edit = (id) => {

    //getter
    RefDetail.DESKRIPSI =  $('#edit_detail_'+id).text();
    RefDetail.ID = id;

    //setter
    $('#ID').val(id);
    $('#DESKRIPSI').val(RefDetail.DESKRIPSI);
    
    modalDetail();

}

var konfirmasi_hapus_detail = (id) => {

    $.confirm({
        title: 'Konfirmasi',
        content: `Apakah Anda Ingin Menghapus data ini ?`,
        buttons: {
            Hapus: {
                btnClass: 'btn-blue',
                keys: ['enter'],
                action: () => {
                    btnHapus = new Tombol('#hapus_detail_'+id);
                    RefDetail.hapus(id);
                }
            },
            Batal: {
                btnClass: 'btn-red',
                keys: ['esc']
            }
        }
    });

}

$('#modal-detail').on('hidden.bs.modal', function (event) {
  RefDetail.reset();
})