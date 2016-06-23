"use strict";
$(document).ready(function() {
  var parametroArr =[];

  $( "#ddEstufa" ).on('changed.bs.select',function() {
    $("#ass_id").children().remove();
    $("#valor_span").text("");
    var estufaId = $( this ).selectpicker('val');
    $.get( "/admin/leituras/getAssociacoesDistinct/" + estufaId, function( data ) {


    }).done(function(data){
     if(data.length > 0){

      for(var i=0; i < data.length; i++){        
        parametroArr[data[i].parametro] = [data[i].unidade];
        $('#ass_id').prepend($('<option>', {
          value: data[i].associacoes_id,
          text: data[i].parametro 
        }));
      }
      $('#divListAssociacoes').empty();
      $('#divAssociacoes').show();
      $('.selectpicker').selectpicker('refresh');
    }else{
     $('#divAssociacoes').hide();
     var html = '<label for="associacao" class="col-xs-12 col-md-12 text-center">Não existem Associações para a Estufa selecionada!</label>' +
     '<div class="text-center">' +
     '<a href="/admin/associacoes/associar" class=" btn btn-success">Criar Associação</a>' +
     '</div>';
     $('#divListAssociacoes').append(html);
   }
 })
  });

  $( "#ass_id" ).on('changed.bs.select',function() {
   var assParam = $('#ass_id option:selected').text();
   var getParam = assParam.split("- ");
   $('#valor_span').text(parametroArr[getParam[0]]);
 });
});