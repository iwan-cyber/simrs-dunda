
// tabes - menu laboratorium
function btn_tab_laboratorium(nopen) {
    $.ajax({
        type: "post",
        url: "Detailpasien/body_laboratorium",
        data:{
            nopen: nopen
        },
        success: function(response) {
            $('.card-body-anamnesis').html(response).show()
        }
    });
}

// tabes - menu radiologi
function btn_tab_radiologi(nopen) {
    $.ajax({
        type: "post",
        url: "Detailpasien/body_radiologi",
        data:{
            nopen: nopen
        },
        success: function(response) {
            $('.card-body-anamnesis').html(response).show()
        }
    });
}

// tabes - menu utd
function btn_tab_utd() {
    $.ajax({
        type: "post",
        url: "Detailpasien/body_utd",
        success: function(response) {
            $('.card-body-anamnesis').html(response).show()
        }
    });
}

// tabes - menu ok
function btn_tab_ok() {
    $.ajax({
        type: "post",
        url: "Detailpasien/body_ok",
        success: function(response) {
            $('.card-body-anamnesis').html(response).show()
        }
    });
}

// tabes - menu mutasi
function btn_tab_mutasi() {
    $.ajax({
        type: "post",
        url: "Detailpasien/body_mutasi",
        success: function(response) {
            $('.card-body-anamnesis').html(response).show()
        }
    });
}

// tabes - menu riwayat
function btn_tab_riwayat() {
    $.ajax({
        type: "post",
        url: "Detailpasien/body_riwayat",
        success: function(response) {
            $('.card-body-anamnesis').html(response).show()
        }
    });
}

// tabes - menu rekam medis
function btn_tab_rekamedis(nopen) {
    btn_anamnesa();
    $.ajax({
        type: "post",
        url: "Detailpasien/bodyrekamedis",
        data: {
            nopen: nopen
        },
        success: function(response) {
            $('.card-body-anamnesis').html(response).show()
        }
    });
    
   
}

function btn_anamnesa(nopen) {
    $.ajax({
        type: "post",
        url: "Anamnesis/Anam_umum",
        data: {
            NOPEN: nopen
        },
        success: function(response) {
            $('.area-input-rekam-medis').html(response).show()
        }
    });
}

function btn_pemeriksaan() {
    $('.area-input-rekam-medis').html(`
    <div class="card-header">
        <h5>PEMERIKSAAN</h5>
    </div>
    `);
    
}
function btn_penilaian() {
    $('.area-input-rekam-medis').html(`
    <div class="card-header">
        <h5>PENILAIAN</h5>
    </div>
    `);
    
}
function btn_icd() {
    $('.area-input-rekam-medis').html(`
    <div class="card-header">
        <h5>ICD</h5>
    </div>
    `);
    
}
function btn_perencanaan() {
    $('.area-input-rekam-medis').html(`
    <div class="card-header">
        <h5>PERENCANAAN</h5>
    </div>
    `);
    
}
function btn_cppt() {
    $('.area-input-rekam-medis').html(`
    <div class="card-header">
        <h5>CPPT</h5>
    </div>
    `);
    
}
function btn_layanan() {
    $('.area-input-rekam-medis').html(`
    <div class="card-header">
        <h5>LAYANAN TINDAKAN</h5>
    </div>
    `);
    
}
function btn_eresep() {
    $('.area-input-rekam-medis').html(`
    <div class="card-header">
        <h5>E-RESEP</h5>
    </div>
    `);
    
}
function btn_konsul() {
    $('.area-input-rekam-medis').html(`
        <h5>KONSULTASI</h5>
    `);
    
}

function btn_final(nopen) {
    $.ajax({
        type: "post",
        url: "Anamnesis/final_layanan",
        data:{
            nopen: nopen
        },
        success: function(response) {
            $('.area-input-rekam-medis').html(response).show()
        }
    });
}

function tabsambildetail([NOPEN]) {
    $.ajax({
        type: "post",
        url: "rekammedis/detailpasien",
        data: {
            NOPEN: NOPEN
        },
        success: function(response) {
            if (response) {
                $("#card-body").html(response);
            }
        }
    });
}

$(document).ready(function () {
    btn_tab_rekamedis();
    
});