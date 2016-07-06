"use strict";
$(document).ready(function() {


  if(Object.keys(cultura).length > 0){
  
   $('.selectpicker').selectpicker();
   $('#tipo_cultura').selectpicker('val', [cultura['tipo_cultura']]);
   $('#tipo_cultivo').selectpicker('val', [cultura['tipo_cultivo']]);
   $('#especie_id').selectpicker('val', [cultura['especie_id']]);

   $('#ddEstufa').selectpicker('val', [cultura['ddEstufa']]);


   $.get( "/admin/culturas/getSetorByEstufa/"+ cultura['ddEstufa'], function( data ) {

   }).done(function(data){
     if(data[1].length > 0){
      for(var i=0; i < data[1].length; i++){
        $('#setor_id').prepend($('<option>', {
          value: data[1][i].id,
          text: data[1][i].nome
        }));
      }

      $('#setor_id').selectpicker('val', [cultura['setor_id']]);
      $('#divAssociacoesSetores').show();
    }else{
     $("#dropdownSetores").children().remove();
     $('#divAssociacoesSetores').hide();
   }
   
 });
   
 }
 


 $('#dInic').datepicker({
  dateFormat: 'yy-mm-dd',
  minDate: 0    
}).datepicker("setDate", new Date());

 $('#dFim').datepicker({
  dateFormat: 'yy-mm-dd',
  minDate: 0
});

 $.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});

 $( "#ddEstufa" ).on('changed.bs.select',function() {
  var t = $("#tipo_cultura").prop("selected");
  $("#setor_id").children().remove();
  var estufaId = $( this ).selectpicker('val');
  $.get( "/admin/culturas/getSetorByEstufa/"+ estufaId, function( data ) {

  }).done(function(data){
   if(data[1].length > 0){

    for(var i=0; i < data[1].length; i++){
      $('#setor_id').prepend($('<option>', {
        value: data[1][i].id,
        text: data[1][i].nome
      }));
    }
    $('#divAssociacoesSetores').show();
    $('.selectpicker').selectpicker('refresh');
  }else{
   $("#dropdownSetores").children().remove();
   $('#divAssociacoesSetores').hide();
 }
})
});

 $("#tipo_cultivo").on('changed.bs.select', function() {
  var tCultivo = $( this ).selectpicker('val');
  if(tCultivo == "outro"){
    $("#dOutro").show();
    $("#inpOutro").prop('required',true);      

  }else{
    $("#dOutro").hide(); 
    $("#inpOutro").prop('required',false);      
  }
});

 $('#dFim').change(function() {
  $("#error").text("");
  var dInic = $('#dInic').datepicker("getDate");
  var dFim = $('#dFim').datepicker("getDate");
  if(dInic!=null){            
    ciclo(dInic,dFim);
  }else{
    dInic = $('#dInic').datepicker('setDate', new Date());
    ciclo(dInic,dFim);   
  }

});


 $('#duracao_ciclo').change(function() {
  var dC = $('#duracao_ciclo').val();
  var dInic = $('#dInic').datepicker("getDate");        
  $("#error").text("");
  if(dInic!=null){            
    fim(dInic,dC); 
  }else{
   dInic = $('#dInic').datepicker('setDate', new Date());
   dInic = $('#dInic').datepicker("getDate"); 
   fim(dInic,dC);  
 }
});

 $('#dInic').change(function() {
  $("#error").text("");
  var dInic = $('#dInic').datepicker("getDate");
  var dFim = $('#dFim').datepicker("getDate");
  var dC = $('#duracao_ciclo').val();
  if(dFim!=null){            
    ciclo(dInic,dFim);        
  }else if(dC!=""){
    fim(dInic,dC);


  }

});


 var fim = function(dInic,dC){
  var c = parseInt(dC);
  var fim = new Date(dInic.getFullYear(), dInic.getMonth(), dInic.getDate() + c);
       // fim.setDate(dInic.getDate() + dC);
       $('#dFim').datepicker('setDate', fim);        
     }

     var ciclo = function(dInic,dFim){
      var duracao= ((dFim - dInic) / (86400000));
      if(duracao > 0){
        $("#duracao_ciclo").val(duracao);
      }else{
        $("#duracao_ciclo").val("");
        $('#dFim').val("");
        $("#error").text("Data de fim tem de ser superior à inicial").css({ 'color': 'red', 'font-size': '100%' });
      }
    }

  });