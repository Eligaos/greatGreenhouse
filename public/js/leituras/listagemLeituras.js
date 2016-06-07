$(document).ready(function() {
	"use strict";
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


  $('#dataInicial').datetimepicker({
    dateFormat: 'yy-mm-dd',
    use24hours: true,
    controlType: myControl,
    timeText: 'Tempo',
    hourText: 'Hora',
    minuteText: 'Minutos',
    currentText: 'Agora',
    closeText: 'Guardar'
  });

  $('#dataFinal').datetimepicker({
    dateFormat: 'yy-mm-dd',
    use24hours: true,
    controlType: myControl,
    timeText: 'Tempo',
    hourText: 'Hora',
    minuteText: 'Minutos',
    currentText: 'Agora',
    closeText: 'Guardar'
  });

  $( "#ddEstufa" ).on('changed.bs.select',function() {
    var dataInicial = $('#dataInicial').datepicker("getDate");
    console.log(dataInicial);
    var t = $("#tipo_cultura").prop("selected");
    $("#setor_id").children().remove();
    var estufaId = $( this ).selectpicker('val');
    $.get( "/admin/culturas/getSetorByEstufa/"+ estufaId, function( data ) {

    }).done(function(data){
     if(data[1].length > 0){

      for(var i=0; i < data[1].length; i++){
       if(data[1][i].nome == "Nenhum"){
        data[1][i].nome = "Geral";
      }
      $('#setor_id').prepend($('<option>', {
        value: data[1][i].id,
        text: data[1][i].nome
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

//href="/admin/leituras/pesquisar"

$('#pesquisar').click(function(){//fazer get para o serviço e devolver as queries
  var tipoID = $('#tipo_id').selectpicker('val');
//var tipo = $("#tipo_id option:selected").text();
//var EstufaID = $("#tipo_id option:selected").text();
var estufaID = $('#ddEstufa').selectpicker('val');
var setorID = $('#setor_id').selectpicker('val');
var dataInicial = $('#dataInicial').val();
var dataFinal = $('#dataFinal').val();
var pesquisa = [tipoID, estufaID, setorID, dataInicial, dataFinal];
console.log(pesquisa);
$.get( "/admin/leituras/pesquisar"+ estufaId, function( data ) {

}).done(function(data){



})

});




});
