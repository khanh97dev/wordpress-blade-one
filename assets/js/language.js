// JavaScript Document
var welcome = {
	vn: 'vi',
	en: 'en'
};
//read previously set cookie value
var language = document.cookie.replace(/(?:(?:^|.*;\s*)language\s*\=\s*([^;]*).*$)|^.*$/, '$1');
var d = new Date();
	d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
var expires = 'expires=' + d.toUTCString();

jQuery(document).ready(function () {
	if (language.length == 0) {
		document.cookie = 'language=' + welcome.vn + ';' + expires + '; path=/';
	} 
	else {
		if (document.cookie.replace(/(?:(?:^|.*;\s*)language\s*\=\s*([^;]*).*$)|^.*$/, '$1') == welcome.vn) {
			
			$('#nation-pc').html("VIE");
		}
		
		else {
			$('#nation-pc').html("ENG");

		}
	}
	var listNation = $('.lang-open');
	var listNations = listNation.find('a');
	
	/*$('#nation-pc').click(function (evt) {
		evt.preventDefault();
		if (listNation.is(':visible')) {
			listNation.hide();
		} 
		else {
			listNation.show();
		}
	});*/
	listNations.each(function (index) {
		var El = $(this);
		El.unbind('click').bind('click', function (e) {
			if (index == 0) {
				document.cookie = 'language=' + welcome.vn + ';' + expires + '; path=/';
			} 
			 
			else {
				document.cookie = 'language=' + welcome.en + ';' + expires + '; path=/';
			}
			location.reload();
		});
	});
	

});