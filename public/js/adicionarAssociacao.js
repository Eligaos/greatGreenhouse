"use strict";
$(document).ready(function() {

  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});

$('.selectpicker').selectpicker('deselectAll');

$('#dropdownEstufas').on('changed.bs.select', function (e) {
  	  $("#dropdownSetores").children().remove();
       var estufaId  = $('#dropdownEstufas').selectpicker('val');

    $.get( "/admin/culturas/getSetor/"+ estufaId, function( data ) {

    }).done(function(data){
    	if(data.length > 0){

	   		for(var i=0; i < data.length; i++){
	            $('#dropdownSetores').append($('<option>', {
	                value: data[i].id,
	                text: data[i].nome
	            }));
	        }
	        $('#divdropdownSetores').show();
	        $('#divAssociacoesSetores').show();
	        $('.selectpicker').selectpicker('refresh');
    	}else{
			$("#dropdownSetores").children().remove();
    		$('#divdropdownSetores').hide();
	        $('#divAssociacoesSetores').hide();
    	}
     
    })
});


  $("#tipo_cultivo").click(function() {
    var tCultivo = $( this ).val();
    if(tCultivo == "outro"){
        $("#dOutro").show();
        $("#inpOutro").prop('required',true);      

    }else{
        $("#dOutro").hide(); 
        $("#inpOutro").prop('required',false);      
    }
});
});