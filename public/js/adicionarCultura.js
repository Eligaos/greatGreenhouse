"use strict";
$(document).ready(function() {

  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});

  $( "#ddEstufa" ).click(function() {
    $("#ddSetor").children().remove();
    var estufaId = $( this ).val();
    $.get( "/admin/culturas/getSetor/"+ estufaId, function( data ) {

    }).done(function(data){
        console.log(data.length);

        for(var i=0; i < data.length; i++){
            $('#ddSetor').append($('<option>', {
                value: data[i].id,
                text: data[i].nome
            }));
        }
    })
});

  $("#tCultivo").click(function() {
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
