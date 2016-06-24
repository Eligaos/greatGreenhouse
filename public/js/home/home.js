$(function() {

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

  for (var j = 0; j <  estufas.data.length; j++) {

   $.get("/admin/leituras/ultimas/"+estufas.data[j].id, function(dados) {

   }).done(function(dados){

     var elem = "#monitor"+dados[0][0].estufa_id;

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

    $(elem).highcharts({
     chart: {
      zoomType: 'x'
    },credits : {
      enabled : false
    },
    title: {
      text: 'Monitor Estufa ' + dados[0][0].estufa_id
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

  });
 };

});