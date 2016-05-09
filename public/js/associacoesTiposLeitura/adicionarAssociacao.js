"use strict";

$(document).ready(function() {

  $('.selectpicker').selectpicker('deselectAll');
  $('#divdropdowntiposLeiturasEstufas').hide();


  $('#dropdownEstufas').on('changed.bs.select', function (e) {
    $('#divdropdowntiposLeiturasEstufas').show();

    var estufaId  = $('#dropdownEstufas').selectpicker('val');
    $('#dropdowntiposLeiturasEstufas').selectpicker('deselectAll');
  /* $.get( "/admin/culturas/getSetor/"+ estufaId, function( data ) {

   }).done(function(data){
       if(data.length > 0){

        for(var i=0; i < data.length; i++){
             $('#dropdownSetores').append($('<option>', {
                 value: data[i].id,
                 text: data[i].nome
             }));
         }
      };
      
      $('#divdropdownSetores').show();
      $('#divAssociacoesSetores').show();
      $('.selectpicker').selectpicker('refresh');
  }else{
     $("#dropdownSetores").children().remove();
     $('#divdropdownSetores').hide();
     $('#divAssociacoesSetores').hide();
 }
 */
});

 /////////////////////////////////////////////
 $('#dropdowntiposLeiturasEstufas').on('changed.bs.select', function (e) {



  var drop = $('#dropdowntiposLeiturasEstufas');

  var estufaId = $('#dropdownEstufas').selectpicker('val');

  var table = "#tableAssociadasEstufa"+ estufaId;
  if(drop.val() != null && drop.val().length > 0){



    var tbody = table + " tbody";
    $(tbody).children().remove();
    var array = [];
    for (var i = 0; i < drop.val().length; i++) {

      var val = drop.val()[i]; 
      var txt = $("#dropdowntiposLeiturasEstufas option[value='"+val+"']").text();

      array.push({
        'id': val ,
        'text': txt 
      }); 
    } 
    var estufaName = $("#dropdownEstufas option[value='"+estufaId+"']").text();

    if(!$(table).length){

     $("<table name='tableAssociadasEstufa"+estufaId+"' id='tableAssociadasEstufa"+estufaId+"' class='table table-filter table-striped table-bordered table-responsive'><caption><h2>"+estufaName +"</h2></caption>" +"<tbody></tbody></table>").appendTo('#containerAssociacoes');
   }
  /* $.each(array, function(key, index) {
    $("<tr><td name='"+estufaName.replace(/\s+/g, '')+"[]' value='"+array[key].id+"'>"+array[key].text+"</td><td><input type='button' onclick='remover(this)' class='btn btn-medium' value='Remover'></td></tr>").appendTo(tbody);
  });*/

  
  $.each(array, function(key, index) {
    $("<tr><td data-name='"+estufaName.replace(/\s+/g, '')+"[]' value='"+array[key].id+"'>"+"<input type='hidden' name='"+estufaName.replace(/\s+/g, '')+"[]"+key+"' value='"+ array[key].id+ "'>"+array[key].text+"</td><td><input type='button' onclick='remover(this)' class='btn btn-medium' value='Remover'></td></tr>").appendTo(tbody);
  });

/*
  $.each(array, function(key, index) {
    $("<tr><td>"+array[key].text+"</td><td><input type='button' onclick='remover(this)' class='btn btn-medium' value='Remover'></td></tr>").appendTo(tbody);
  });*/


}else{
  $(table).remove();

}
});
});

function remover(elmnt) {

  var value = $(elmnt).closest("tr").children().first().attr('value'); 
  $(elmnt).closest("tr").remove();
  $("#dropdowntiposLeiturasEstufas option[value='"+value+"']").prop('selected', false) ;
  $('.selectpicker').selectpicker('render');

  var estufaId = $('#dropdownEstufas').selectpicker('val');
  var table = "#tableAssociadasEstufa"+ estufaId;

  if($(table).find("tr").length == 0){
    $(table).remove();

  }



}
