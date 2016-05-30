
$(document).ready(function() {
"use strict";


  $( "#ddEstufa" ).on('changed.bs.select',function() {
    var t = $("#tipo_cultura").prop("selected");
    $("#setor_id").children().remove();
    var estufaId = $( this ).selectpicker('val');
    $.get( "/admin/culturas/getSetorByEstufa/"+ estufaId, function( data ) {

    }).done(function(data){
     if(data[1].length > 0){

      for(var i=0; i < data[1].length; i++){
        if(data[1][i].nome == "Nenhum"){
          data[1][i].nome = "Geral";
        }
        $('#setor_id').prepend($('<option>', {
          value: data[1][i].id,
          text: data[1][i].nome
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


});
