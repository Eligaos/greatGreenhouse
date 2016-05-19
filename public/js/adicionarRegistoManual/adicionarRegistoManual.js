"use strict";
$(document).ready(function() {

 $.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});

 $( "#ddEstufa" ).on('changed.bs.select',function() {
  $("#ass_id").children().remove();
  var estufaId = $( this ).selectpicker('val');
  $.get( "/admin/leituras/getAssociacoes/" + estufaId, function( data ) {


  }).done(function(data){
   if(data.length > 0){

    for(var i=0; i < data.length; i++){
      var parametro = [data[i].parametro, data[i].unidade];
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
  var ass = $( this ).selectpicker('val');

});
});