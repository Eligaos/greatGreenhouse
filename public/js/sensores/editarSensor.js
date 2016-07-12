"use strict";
$(document).ready(function() {
  if(Object.keys(sensor).length > 0){

    $('.selectpicker').selectpicker();
    $('#tipo_id').selectpicker('val', [sensor[0]['tipo_leitura_id']]);
 
  }

});