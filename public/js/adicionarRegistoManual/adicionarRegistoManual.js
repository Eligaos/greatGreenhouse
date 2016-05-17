"use strict";
$(document).ready(function() {

 $.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});

 $( "#ddEstufa" ).on('changed.bs.select',function() {
  $("#tipo_id").children().remove();
  var estufaId = $( this ).selectpicker('val');
  $.get( "/admin/leituras/getAssociacoes/" + estufaId, function( data ) {

  }).done(function(data){
   if(data.length > 0){

    for(var i=0; i < data.length; i++){
      $('#tipo_id').prepend($('<option>', {
        value: data[i].id,
        text: data[i].parametro
      }));
    }
    $('#divAssociacoes').show();
    $('.selectpicker').selectpicker('refresh');
  }else{
   $("#dropdownSetores").children().remove();
   $('#divAssociacoes').hide();
 }
})
});


});