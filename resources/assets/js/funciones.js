function mensajes_alerta(mensaje,tipo,titulo){
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "progressBar": true,
	  "positionClass": "toast-top-full-width",
	  "onclick": null,
	  "showDuration": "1000",
	  "hideDuration": "1000",
	  "timeOut": "3000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
	toastr[tipo](mensaje, titulo);
}
function mensajes_alerta_pequeño(mensaje,tipo,titulo){
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "progressBar": true,
	  "positionClass": "toast-top-center",
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "3000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
	toastr[tipo](mensaje, titulo);
}

function transicion(mensaje){
	$.blockUI({
	    css: {
	        border: 'none',
	        padding: '15px',
	        backgroundColor: '#000',
	        '-webkit-border-radius': '10px',
	        '-moz-border-radius': '10px',
	        opacity: .5,
	        color: '#fff'
	    },
	    message: "<h1>"+mensaje+"</h1>"
	});
}

function transicionSalir(){
	$.unblockUI();
}