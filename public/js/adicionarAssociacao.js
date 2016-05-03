"use strict";
$(document).ready(function() {

  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});

  $( "#dropdownEstufas" ).click(function() {
    $("#dropdownSetores").children().remove();
    var estufaId = $( this ).val();
    $.get( "/admin/culturas/getSetor/"+ estufaId, function( data ) {

    }).done(function(data){
        console.log(data.length);

        for(var i=0; i < data.length; i++){
            $('#dropdownSetores').append($('<option>', {
                value: data[i].id,
                text: data[i].nome
            }));
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