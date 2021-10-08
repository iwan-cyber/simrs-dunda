class Wilayah {
    
    ID;
    ID_JENIS;
    DESKRIPSI;
    STATUS;
    LOAD_JENIS;
    SERVICE = 'http://simrs-dunda.test/master/wilayah';
    SERVICE_METHOD = '';

    loadWilayah() {
         
        tampilkanLoading("Loading di mulai");

        fetch(this.SERVICE+this.SERVICE_METHOD)
            .then(response => response.json())
            .then(response => {
                tampilkanLoading("Loading di akhiri");
                console.log(response.DATA);   
                addItemOptionWilayah(response.DATA, this.LOAD_JENIS);
         })
        

    }

}

class Provinsi extends Wilayah {
    
    constructor() {
        super();   
        this.SERVICE_METHOD = '/provinsi';
        this.LOAD_JENIS = 'PROVINSI';
      
    }
}

class Kabupaten extends Wilayah {
    
    constructor(idprovinsi) {
        super();   
        this.SERVICE_METHOD = '/kabupaten/'+idprovinsi;
        this.LOAD_JENIS = 'KABUPATEN';
    }

}

class Kecamatan extends Wilayah {
    
    constructor(idkabupaten) {
        super();   
        this.SERVICE_METHOD = '/kecamatan/'+idkabupaten;
        this.LOAD_JENIS = 'KECAMATAN';
    }

}

class Kelurahan extends Wilayah {
    
    constructor(idkecamatan) {
        super();   
        this.SERVICE_METHOD = '/kelurahan/'+idkecamatan;
        this.LOAD_JENIS = 'KELURAHAN';
    }

}



function tampilkanLoading(status) {
    console.log(status)
}

function addItemOptionWilayah(wilayahData, selectWilayah) {
    
    let optData = '';
    let itemData = wilayahData.forEach(function(item) {
        optData += `<option value="${item.ID}">${item.DESKRIPSI}</option>`;    
    });
    
    console.log(optData);
    
    $('#'+selectWilayah).empty().append(optData);          
   
}

function getKabupaten() {
    
    let idProvinsi = $('#PROVINSI').val();
    let kab = new Kabupaten(idProvinsi);
    kab.loadWilayah();    
}

function getKecamatan() {
    
    let idKabupaten = $('#KABUPATEN').val();
    let kec = new Kecamatan(idKabupaten);
    kec.loadWilayah();    
}

function getKelurahan() {
    
    let idKecamatan = $('#KECAMATAN').val();
    let kel = new Kelurahan(idKecamatan);
    kel.loadWilayah();    
}