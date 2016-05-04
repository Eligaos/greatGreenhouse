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
 /////////////////////////////////////////////

 $('#buttonAssociarEstufa').click(function(){
  var drop = $('#dropdowntiposLeiturasEstufas');

    if(drop.val().length > 0){
            $('#tableAssociadasEstufas').children().remove();
          var array = [];
        for (var i = 0; i < drop.val().length; i++) {
              
          var val = drop.val()[i]; 
         var txt = $("#dropdowntiposLeiturasEstufas option[value='"+val+"']").text();

         
               array.push({
                    'id': val ,
                    'text': txt 
               }); 
         } 
 
  $.each(array, function(key, index) {
            // $("<li value='" + array[key].id + "'>"+array[key].text+"</li>").appendTo("ul");
     $("<tr><td><div class='ckbox'><input type='checkbox' id='checkbox"+key+"'></div></td><td>"+array[key].text+"</td><td><input type='button' class='remove-button btn btn-medium' value='Remover'></td></tr>").appendTo("#tableAssociadasEstufas");
    });

      
    };
});

$(document).on("click", ".remove-button", function(){
    $(this).closest("tr").remove();    
});


});

