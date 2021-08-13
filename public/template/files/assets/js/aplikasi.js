var today = new Date();

function appjs() { return $.getScript('<?php echo _JS_; ?>/aplikasi.js'); }
function loading(id) { $(id).loading('toggle'); }
function redirect(path) { window.location.replace(path); }
function toast(pesan) { $.notify(pesan); }
function currentDate() { return today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear(); }
function angka (num) { return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') }
function unAngka(num) { return num.toString().replace(/\./g, ''); }
function uang(num) { return num.toString().replace(/\,/g, ''); }
function _log(value) { console.log(value) }
function _info(value) { console.info(value) }
function _error(value) { console.error(value) }

function getVal(id) { return $(id).val(); }
function setVal(id, value) { $(id).val(value); }


function genbatch() {

	var lengthInput = 8;

   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < lengthInput; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return '#'+result+'#';
}

//console.log(makeid(5));

var Angka = class {

	static uang(nilai) {

		if(typeof(nilai) === 'number')
			return nilai.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
		else
			return Number(nilai).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
	}

	static ribuan(nilai) {
		return Number(nilai).toLocaleString('id-ID');
	}

	static clean(nilai) {
		return Number(nilai.toString().replace(/\,/g, ''));
	}

	static cleandot(nilai) {
		return Number(nilai.toString().replace(/\./g, ''));
	}

}

var Uang = class {

	static nocomma(value) {

		return value.toString().replace(/\,/g, '');

	}

	static noformat(value)
	{
		return Number(value.toString().replace(/\,/g, ''));
	}

	static nojumlah(value)
	{
		return Number(value.replace(/\./g, ''));
	}

	static jumlah(value)
	{
		return Number(value).toLocaleString('id-ID');
	}

	//method untuk menformat menjadi tampilan uang
	static format(value) {

		//jika tidak ada tanda titik,
		if((value.toString().indexOf('.')) < 0)
		{
			//tambahkan 2 anka dibelakang titik
			return Number(value.toFixed(2)).toLocaleString(undefined, {minimumFractionDigits: 2});
		}
		else
		{
			return Number(value).toLocaleString(undefined, {minimumFractionDigits: 2})
		}

	}
}


var Msg = class {

	static err(msg) {

		$.alert(
		{
			title: 'Error',
			content: msg,
			type: 'red',
			icon: 'fa fa-exclamation-triangle'
		});
	}

	static warn(msg) {

		$.alert({
			title: 'Peringatan',
			content: msg,
			type: 'yellow',
			icon: 'fa fa-exclamation-triangle'
		})

	}

	static done(msg) {
		$.alert({
			title: 'Berhasil',
			content: msg,
			type: 'green',
			icon: 'fa fa-exclamation-triangle'

		})

	}

	static info(msg) {
		$.alert({
			title: 'informasi',
			content: msg,
			type: 'green',
			icon: 'fa fa-exclamation-triangle'

		})

	}

} //class msg


var Pesan = class {

	static err(msg='', judul='Error') {

	    swal({
            title: judul,
            text: msg,
  		    icon: "error",
		});
	}

	static warning(msg='', judul='Peringatan') {

		swal({
            title: judul,
            text: msg,
            icon: "warning",
        });

	}

	static done(msg, judul='Berhasil') {
	   
       swal({
            title: judul,
            text: msg,
            icon: "success",
        });

	}

	static info(msg, judul='Info') {

        swal({
            title: judul,
            text: msg,
            icon: "info",
        });

	}

} //class msg

var Tombol = class {

	constructor(elemen)
	{
		this.elemen = elemen;
		this.originalCaption = $(elemen).html();
		this.originalClass = $(elemen).attr('class');
	}

	reset()
	{
		$(this.elemen).html(this.originalCaption);
		$(this.elemen).removeAttr('class').addClass(this.originalClass);
	}

	//fungsi untuk menset warna tombol
	setWarna(classWarna) {
		this.blank();
		$(this.elemen).addClass('btn-'+classWarna);
	}

	//fungsi untuk menset caption tombol
	setCaption(captionTombol) {
		$(this.elemen).html('').html(captionTombol);
	}

	//fungsi private untuk mereset tomobl
	blank() {
		this.removeClass('btn-primary');
		this.removeClass('btn-warning');
		this.removeClass('btn-default');
		this.removeClass('btn-success');
		this.removeClass('btn-danger');

	}

	hide()
	{
		$(this.elemen).hide();
	}


	show()
	{
		$(this.elemen).show();
	}


	primary(caption)
	{
		this.blank();
		this.setCaption(caption);
		this.setWarna('primary');
	}

	warning(caption)
	{
		this.blank();
		this.setCaption(caption);
		this.setWarna('warning');
	}

	success(caption)
	{
		this.blank();
		this.setCaption(caption);
		this.setWarna('success');
	}

	danger(caption)
	{
		this.blank();
		this.setCaption(caption);
		this.setWarna('danger');
	}

	//fungsi private untuk mengahpus kelas tombol
	removeClass(classHapus) {

		if($(this.elemen).hasClass(classHapus))
		{
			$(this.elemen).removeClass(classHapus);
		}
	}

	//fungsi untuk set text Loading
	loading(textLoading)
	{

		this.blank();
		this.setWarna('warning');
		this.setCaption(`<i class="fas fa-spinner fa-pulse"></i> ${textLoading}`);
	}


} //end of class Tombol()

var Tabel = class {

	constructor(elemen)
	{
		this.elemen = elemen;
		this.row = '';
		this.col = 0;
	}

	static loadingRow(id)
	{
		$(id).loading('toggle');
	}

	removeRow(id)
	{
		$(id).remove();
	}

	remove(){
		console.log(`nilai row ${this.row}`);
		$(this.row).remove();
	}

	text(rowId, col){
		return $(rowId).eq(col).text();
	}

	rows(value)
	{
		this.row = value;
		return this;
	}

	cols(value)
	{
		this.col = value;
		return this;
	}

	setText(rowId, col, data)
	{
		$(rowId).eq(col).text(data);
	}

	html(rowId, col){
		return $(rowId).eq(col).html();
	}

	lastCol()
	{
		$(this.row).find('td:first')
	}

	firstCol()
	{

	}

	setFirstCol(rowId)
	{

	}

	setLastCol(rowId)
	{

	}

	blank()
	{
		let blankRow = `<tr id="blank" style="background: aliceblue; text-align: center"><td colspan="${this.lengthCol()}">Tidak Ada Data</td></tr>`;
		this.append(blankRow);
	}

	blankRow(panjang)
	{
		let blankRow = `<tr id="blank" style="background: aliceblue; text-align: center"><td colspan="${panjang}">Tidak Ada Data</td></tr>`;
		this.append(blankRow);
	}

	empty(){
		$(this.elemen+' tbody').empty();
	}

	prependDet(rowId, data){

		let dataLength = data.length;
		let x = '';

		for(i=0;i<dataLength;i++)
		{
			x += `<td>${data[i]}</td>`;
		}

		let rowdata = `<tr id="${rowId}">${x}</tr>`;

		$(this.elemen +' tbody').prepend(rowdata);
	}

	prepend(data){

		$(this.elemen+' tbody').prepend(data);

	}

	appendDet(rowId, data){

		let dataLength = data.length;
		let x = '';

		for(i=0;i<dataLength;i++)
		{
			x += `<td>${data[i]}</td>`;
		}

		let rowdata = `<tr id="${rowId}">${x}</tr>`;

		$(this.elemen+' tbody').prepend(rowdata);
	}

	append(data){

		console.log('ini rincian');
		console.log(`ini elemen ${this.elemen}`);
		$(this.elemen+' tbody').append(data);

	}

	length(){

		return $(this.elemen+' tbody').find('tr').length;

	};

	lengthCol()
	{
		return $(this.elemen+' tfoot').find("tr:first td").length;
	}



}

