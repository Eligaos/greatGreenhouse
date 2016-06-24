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

  Highcharts.setOptions({
    global: {
      useUTC: false
    },
    lang: {
      months: ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho',  'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'],
      weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
      shortWeekdays: ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sab'],
      shortMonths:  [ "01" , "02" , "03" , "04" , "05" , "06" , "07" , "08" , "09" , "10" , "11" , "12"],
      downloadSVG: "Exportar para imagem em SVG",
      downloadPNG:"Exportar para imagem em PNG",
      downloadPDF: "Exportar para ficheiro PDF",
      downloadJPEG: "Exportar para imagem em JPEG",
      printChart: "Imprimir Gráfico",
      resetZoom: "Anular zoom",
      resetZoomTitle: "Anular zoom para escala 1:1"
    }
  });

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
$('#exportar').click(function(){

});

$('#grafico').click(function(){
  var dados = {};
  dados['_token'] = $("[name=_token]").val();
  dados['tipo_id'] =  $('#tipo_id').selectpicker('val');
  dados['ddEstufa'] =  $('#ddEstufa').selectpicker('val');
  dados['setor_id'] = $('#setor_id').selectpicker('val');
  dados['data_inicial'] =  $('#dataInicial').val();
  dados['data_final'] =  $('#dataFinal').val()

  $.post('/admin/leituras/grafico', dados, function(dados) {


  }).done(function(dados){


   if(dados != null){
    $('#dataTable').hide();
    $("#graficoDiv").toggleClass("monitor");
    var data = [];

    for (var i = 0; i < dados.length; i++) {

     var points = [];

     for (var j = 0; j < dados[i].length ; j++) {
      points.push([moment(dados[i][j].data).valueOf(), parseFloat(dados[i][j].valor)]);
    }

    if(points.length != 0){
      data.push({
        name: dados[i][0].parametro,
        data: points,
        tooltip: {
          valueSuffix: " "+dados[i][0].unidade
        }
      });

    }
  }

  

  $("#graficoDiv").highcharts({
   chart: {
    zoomType: 'x'
  },credits : {
    enabled : false
  },
  title: {
    text: ''
  },
  subtitle: {
    text: document.ontouchstart === undefined ?
    'Clique e arraste no gráfico para fazer zoom' : 'Faça pinch para fazer zoom'
  },
  xAxis: {
    type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
            hour: '%H:%M',
            month: '%e/%b',
            day: '%e/%b',
            year: '%b'
          }
        },
        yAxis: {
          title: {
            text: null
          }
        },
        tooltip: {
          headerFormat: '{point.x: %e/%b/%y às %Hh:%Mm}<br> ',

        },
        plotOptions: {
          spline: {
            marker: {
              enabled: true
            }
          }
        },

        series: data
      });
}
});


});




$('#pesquisar').click(function(){//fazer get para o serviço e devolver as queries
  $('#dataTable').show();

//var tipo = $("#tipo_id option:selected").text();
//var EstufaID = $("#tipo_id option:selected").text();

var dados = {};
dados['_token'] = $("[name=_token]").val();
dados['tipo_id'] =  $('#tipo_id').selectpicker('val');
dados['ddEstufa'] =  $('#ddEstufa').selectpicker('val');
dados['setor_id'] = $('#setor_id').selectpicker('val');
dados['data_inicial'] =  $('#dataInicial').val();
dados['data_final'] =  $('#dataFinal').val()

$.post('/admin/leituras/', dados);


});
});



