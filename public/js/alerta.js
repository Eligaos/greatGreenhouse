"use strict";
$(document).ready(function() {
	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
	if ($('#alerta').length){
		var span = document.getElementById("alerta").innerHTML;
		swal({   title: "Ocorrência de Alarme!",   
			text: "Alarme na estufa: " + span,   
			type: "warning",   
			confirmButtonText: "Cool",
			showCancelButton: true,
			confirmButtonText: "Ir para página Inicial.",  
			cancelButtonText: "Continuar." }, 
			function(isConfirm){   
				if (isConfirm) {     
					$.post('/admin/verAlerta',
					{
						'_token': $('meta[name=csrf-token]').attr('content'),
						verAlerta: 1
					}).error(
               // ...
               ).success(
               function(data){
               	 window.location.href  = '/admin/home';
               }
               );   
           } else {    
           	$.post('/admin/verAlerta',
           	{
           		'_token': $('meta[name=csrf-token]').attr('content'),
           		verAlerta: 0           		
           	})
           }
       });


	}
});
