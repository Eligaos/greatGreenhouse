"use strict";
$(document).ready(function() {
  var parametroArr =[];



  var myControl=  {
    create: function(tp_inst, obj, unit, val, min, max, step){
      $('<input class="ui-timepicker-input" value="'+val+'" style="width:50%">')
      .appendTo(obj)
      .spinner({
        min: min,
        max: max,
        step: step,
        change: function(e,ui){ // key events
            // don't call if api was used and not key press
            if(e.originalEvent !== undefined)
              tp_inst._onTimeChange();
            tp_inst._onSelectHandler();
          },
        spin: function(e,ui){ // spin events
          tp_inst.control.value(tp_inst, obj, unit, ui.value);
          tp_inst._onTimeChange();
          tp_inst._onSelectHandler();
        }
      });
      return obj;
    },
    options: function(tp_inst, obj, unit, opts, val){
      if(typeof(opts) == 'string' && val !== undefined)
        return obj.find('.ui-timepicker-input').spinner(opts, val);
      return obj.find('.ui-timepicker-input').spinner(opts);
    },
    value: function(tp_inst, obj, unit, val){
      if(val !== undefined)
        return obj.find('.ui-timepicker-input').spinner('value', val);
      return obj.find('.ui-timepicker-input').spinner('value');
    }
  };
  var now = new Date();

  var last24 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours() - 24, now.getMinutes());

  $('#hora').datetimepicker({
    dateFormat: 'yy-mm-dd',
    minDate: last24,
    maxDate: new Date(),
    use24hours: true,
    controlType: myControl,
    timeText: 'Tempo',
    hourText: 'Hora',
    minuteText: 'Minutos',
    currentText: 'Agora',
    closeText: 'Guardar'
  });

  
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
  });

  $( "#ddEstufa" ).on('changed.bs.select',function() {
    $("#ass_id").children().remove();
    $("#valor_span").text("");
    var estufaId = $( this ).selectpicker('val');
    $.get( "/admin/leituras/getAssociacoes/" + estufaId, function( data ) {


    }).done(function(data){
     if(data.length > 0){

      for(var i=0; i < data.length; i++){;

        parametroArr[data[i].parametro] = [data[i].unidade];
        $('#ass_id').prepend($('<option>', {
          value: data[i].associacoes_id,
          text: data[i].sensor_nome + " - " + data[i].parametro 
        }));
      }
      $('#divListAssociacoes').empty();
      $('#divAssociacoes').show();
      $('#submit').attr("disabled", false).attr('title', "Guardar Registo");
      $('.selectpicker').selectpicker('refresh');
    }else{
     $('#divAssociacoes').hide();
     $('#divListAssociacoes').empty();
     var html = '<label for="associacao" class="col-xs-12 col-md-12 text-center">Não existem Associações para a Estufa selecionada!</label>' +
     '<div class="text-center">' +
     '<a href="/admin/associacoes/associar" class=" btn btn-success">Criar Associação</a>' +
     '</div>';
     $('#divListAssociacoes').append(html);
     $('#submit').attr("disabled", true).attr('title', "Insira uma associação para a Estufa selecionada!");
   }
 })
  });

  $( "#ass_id" ).on('changed.bs.select',function() {
   var assParam = $('#ass_id option:selected').text();
   var getParam = assParam.split("- ");
   $('#valor_span').text(parametroArr[getParam[1]]);
 });
});