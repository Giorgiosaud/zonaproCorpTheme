jQuery(document).ready(function(){
	var ic=$('.informacionesCorporativas');
	if(ic.children().length<=2){
		ic.css('width','80%');
	}
	if(!!navigator.userAgent.match(/Firefox/i)){

		$('html').addClass('firefox');
		var mt=$('.informacionesCorporativas').height();
		$('.PostCirculares').css('padding-top',mt).css('margin','auto');
	};
	$('.ProductoCircular__Item__Titulo').igualarAltura();
	$('.ProductoCircular__Item__Resumen').igualarAltura();
	$('.PostCircular__Item__Resumen').igualarAltura();
	$('.PostCircular__Item__Titulo').igualarAltura();
	var p = new Parallax('.ImagenAnchoCompleto__imagen').init()
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
	if(document.getElementById('map')){
		var geocoder = new google.maps.Geocoder();
		geocodeAddress(geocoder);
	}
}

function geocodeAddress(geocoder) {
	var url=location.origin,
		address =String(vars.mapa);
	window.address=address;
	console.log(address);
	/*var image = {
	url: url+'/wp-content/themes/politicaygobierno/img/maps-marker-politica.png',
		// This marker is 20 pixels wide by 32 pixels high.
		size: new google.maps.Size(147, 80),
		// The origin for this image is (0, 0).
		origin: new google.maps.Point(0, 0),
		// The anchor for this image is the base of the flagpole at (0, 32).
		anchor: new google.maps.Point(70, 80)
	};*/
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
	$('#enviarEmail').click(function(e) {
		e.preventDefault();
		console.log(vars.ajaxurl);
   		$.post(vars.ajaxurl, {data:$('#emailForm').serializeObject(),action:'sendEmail'}, function(data, textStatus, xhr) {
				swal({title:"Listo!",text:"Pronto nos Contactaremos con Usted!", type:"success"},function(){
				window.location.href =vars.redirect;
				});
			}).fail(function(e) {
				swal({title:"Listo!",text:"ha Sucedido un error "+e, type:"error"},function(){

				});
			})
		}); 

//# sourceMappingURL=main.js.map
