

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
            getPegawaiByProfesi();
        }
            
        modalPegawai('hide');

    })

    .always(() => {
        reset()
        btnSimpan.reset();
    });
        
}


function getPegawaiByProfesi() {

    let kelompok_pegawai = $('#KELOMPOK_PEGAWAI').val();

    let simpandata = $.ajax(url+'/'+kelompok_pegawai, {
        dataType: 'json',
        type: 'POST'
        //beforeSend: () => btnSimpan.loading('menyimpan')
    })
    
    .done(function(data, textStatus, jqXHR) {

        if( ! data.RESULT)
        {
            Msg.error(data.PESAN);
        }
        else
        {
            //console.log(data.DATA);

            $('#list-pegawai').empty();
            setListPegawai(data.DATA);

        }
            

    })
        
}


function setListPegawai(dataPegawai) {


    dataPegawai.forEach(function(pegawai) {

        let edit = `<button type="button" class="btn btn-info btn-out btn-sm waves-effect waves-light" 
                        id="edit_${pegawai.ID}" 
                        onclick="edit(${pegawai.ID})"
                        data-pegawai='${JSON.stringify(pegawai)}'>
                            <i class="ti-close"></i>Edit
                    </button>&nbsp;`;

        let hapus = `<button type="button" class="btn btn-danger btn-out btn-sm waves-effect waves-light" 
                        id="hapus_${pegawai.ID}" 
                        onclick="konfirmasi_hapus(${pegawai.ID})">
                            <i class="ti-pencil"></i>Hapus
                    </button>`;


        let x = `<tr>
                    <td>${pegawai.ID}</td>
                    <td>${pegawai.NAMA_PEGAWAI}</td>
                    <td>${pegawai.KELOMPOK_PEGAWAI}</td>
                    <td>${edit} ${hapus}</td>
                </tr>`;

        $('#list-pegawai').append(x);
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
            getPegawaiByProfesi();
        }
    })

    .always(() => btnHapus = '')
        
}


function reset() {
    $('#ID').val('');
    $('#IDKELOMPOK_PEGAWAI').val('');
}

function edit(id) {

    let dataPegawai = $('#edit_'+id).attr('data-pegawai');
    
    let pegawai = JSON.parse(dataPegawai);

    $('#ID').val(id);
    $('#IDKELOMPOK_PEGAWAI').val(pegawai.IDKELOMPOK_PEGAWAI);

    modalPegawai();

}

function register() {

   tabel = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: url+'/data'
        }
    });
}

$(document).ready(function() {
    //register();
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