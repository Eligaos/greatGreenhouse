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
      printChart: "Imprimir Gráfico"
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
        type: 'spline'
      },credits : {
        enabled : false
      },
      title: {
        text: 'Monitor Estufa ' + dados[0][0].estufa_id
      },
      xAxis: {
        type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
            hour: '%H:%M',
            month: '%e/%b',
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

  /*
    var data = [];
    var ykeys = [];
    var labels = [];
    for (var j = 0; j < dados.length; j++) {


      if (dados[j][0] != null) {
        ykeys[j]= 'value'+dados[j][0].parametro;
        labels[j]= dados[j][0].parametro;
      }

      for (var i =0; i < dados[j].length; i++) {
        data.push({
          time: dados[j][i].data,
          ['value'+dados[j][i].parametro]: dados[j][i].valor 
        });

      }
    }

    new Morris.Line({
      // ID of the element in which to draw the chart.
      element: 'monitor'+dados[0][0].estufa_id,
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      resize: true,
      data: data,
      stacked: true,
      pointSize: 3,
      hideHover: true,
      // The name of the data record attribute that contains x-values.
      xkey: 'time',
      // A list of names of data record attributes that contain y-values.
      ykeys: ykeys,
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: labels,
    });*/
  });
 };

});