$(function() {
  for (var j = 0; j <  estufas.data.length; j++) {

   $.get("/admin/leituras/ultimas/"+estufas.data[j].id, function(dados) {

   }).done(function(dados){

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
    });
  });
 };

});