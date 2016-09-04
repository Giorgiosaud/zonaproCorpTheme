var childGeocode;
jQuery(document).ready(function($){
	$('.myIframe').css('height', $(window).height()+'px');
	var ic=$('.informacionesCorporativas');
	if(ic.children().length<=2){
		ic.css('width','80%');
	}
	if(!!navigator.userAgent.match(/Firefox/i)){

		$('html').addClass('firefox');
		var mt=$('.informacionesCorporativas').height();
		$('.PostCirculares').css('padding-top',mt).css('margin','auto');
	}
	$('.ProductoCircular__Item__Titulo').igualarAltura();
	$('.ProductoCircular__Item__Resumen').igualarAltura();
	$('.PostCircular__Item__Resumen').igualarAltura();
	$('.PostCircular__Item__Titulo').igualarAltura();
	if($('.ImagenAnchoCompleto__imagen').length>0){
		var p = new Parallax('.ImagenAnchoCompleto__imagen').init();
	}
	$('.PostCarusel').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		adaptiveHeight: true,
	responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
			}
		}
	]
});
});

(function( $ ){
	$.fn.igualarAltura = function() {
		var $this=this,
			height=0;
		$this.each(function(index,value){
			height=(height>$(value).height())?height:$(value).height();
		});
		$this.height(height);
		return $this;
	}; 
})( jQuery );
var map;
function initMap() {
	console.info('Loaded Maps and executing');
	if(document.getElementById('map')){

		geocodeAddress();
	}
	if ($.isFunction(childGeocode)) {
		childGeocode();
	}

}

function geocodeAddress() {
	var geocoder = new google.maps.Geocoder(),
		url=location.origin,
		address =String(Zonapro.mapa);
	window.address=address;
	geocoder.geocode({'address': address}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			map = new google.maps.Map(document.getElementById('map'), {
				center: results[0].geometry.location,
				zoom: 16
			});
			var marker = new google.maps.Marker({
				map: map,
				//		icon: image,
				zoomControl: true,
				scaleControl: true,
				position: results[0].geometry.location
			});
		} else {
			alert('Geocode was not successful for the following reason: ' + status);
		}
	});
}
$.fn.serializeObject = function()
{
	var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if (o[this.name] !== undefined) {
			if (!o[this.name].push) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};
function recaptchaCallback(){
	$('#enviarEmail').removeAttr('disabled');
}
jQuery(document).ready(function($) {
	$('#enviarEmail').click(function(e) {
		e.preventDefault();
		$.post(Zonapro.url, {data:$('#emailForm').serializeObject(),action:'sendEmail'}, function(data, textStatus, xhr) {
			swal({title:"Listo!",text:"Pronto nos Contactaremos con Usted!", type:"success"},function(){
				if(Zonapro.redirect===null){
					window.location.href="/";	
				}
				else{
					window.location.href =Zonapro.redirect;
				}
			});
		}).fail(function(e) {
			swal({title:"Listo!",text:"ha Sucedido un error "+e.responseText, type:"error"},function(){
				grecaptcha.reset();
			});
		});
	}); 
});

//# sourceMappingURL=main.js.map
