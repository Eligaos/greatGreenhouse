"use strict";
$(document).ready(function() {

    $('#dInic').datepicker({
      dateFormat: 'yy-mm-dd'
  });
    $('#dFim').datepicker({
      dateFormat: 'yy-mm-dd'
  });

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });

    $( "#ddEstufa" ).click(function() {
        console.log( $( "#dInic" ).val());

        $("#setor_id").children().remove();
        var estufaId = $( this ).val();
        $.get( "/admin/culturas/getSetorByEstufa/"+ estufaId, function( data ) {

        }).done(function(data){
            for(var i=0; i < data.length; i++){
                $('#setor_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].nome
                }));
            }
        })
    });

    $("#tipo_cultivo").click(function() {
        var tCultivo = $( this ).val();
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

    $('#dInic').change(function() {
        $("#error").text("");
        var dInic = $('#dInic').datepicker("getDate");
        var dFim = $('#dFim').datepicker("getDate");
        if(dFim!=null){            
            ciclo(dInic,dFim);
        }else{
            //dInic = $('#dInic').datepicker('setDate', new Date());

        }

    });

    var fim = function(dInic,ciclo){
        
    }

    var ciclo = function(dInic,dFim){
        var duracao= ((dFim - dInic) / (86400000));
        if(duracao > 0){
            $("#duracao_ciclo").val(duracao);
        }else{
            $("#duracao_ciclo").val("");
            $("#error").text("Data de fim tem de ser superior à inicial").css({ 'color': 'red', 'font-size': '100%' });
        }
    }

});