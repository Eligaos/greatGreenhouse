"use strict";
$(document).ready(function() {
   // $("#tipo_cultura").selectpicker('render');

   var tC = $("#tipo_cultura").val();
   $("#tipo_cultura").selectpicker( tC);
   $("#tipo_cultura").selectpicker('render');
   $("#tipo_cultura").selectpicker('refresh');

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
            //dInic = $('#dInic').datepicker('setDate', new Date());

          }

        });
    /*var date2 = $('.pickupDate').datepicker('getDate');
    var nextDayDate = new Date();
    nextDayDate.setDate(date2.getDate() + 1);
    $('input').val(nextDayDate);*/

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