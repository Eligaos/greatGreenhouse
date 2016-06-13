"use strict";
$(document).ready(function() {
  var parametroArr =[];

  $( "#ddEstufa" ).on('changed.bs.select',function() {
    $("#ass_id").children().remove();
    $("#valor_span").text("");
    var estufaId = $( this ).selectpicker('val');
    $.get( "/admin/leituras/getAssociacoes/" + estufaId, function( data ) {


    }).done(function(data){
     if(data.length > 0){

      for(var i=0; i < data.length; i++){
        console.log(data);
        parametroArr[data[i].parametro] = [data[i].unidade];
        $('#ass_id').prepend($('<option>', {
          value: data[i].associacoes_id,
          text: data[i].sensor_nome + " - " + data[i].parametro 
        }));
      }
      $('#divAssociacoes').show();
      $('.selectpicker').selectpicker('refresh');
    }else{
     $('#divAssociacoes').hide();
   }
 })
  });

  $( "#ass_id" ).on('changed.bs.select',function() {
   var assParam = $('#ass_id option:selected').text();
   var getParam = assParam.split("- ");
   $('#valor_span').text(parametroArr[getParam[1]]);
 });
});