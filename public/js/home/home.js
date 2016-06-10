$(function() {
  for (var j = 0; j <  estufas.data.length; j++) {

   $.get("/admin/leituras/ultimas/"+estufas.data[j].id, function(dados) {
   }).done(function(dados){
    console.log(dados);
    var data = [];
    var ykeys = [];
    var labels = [];
    for (var j = 0; j < dados.length; j++) {
      if (dados[j][0] != null) {
        labels[j]= dados[j][0].parametro;
      }

      for (var i =0; i < dados[j].length; i++) {
        var tempo = dados[j][i].data;
        data.push({
          [labels[j]]: dados[j][i].valor,
          [labels[j+1]]: dados[j+1][i].valor,
          time: dados[j][i].data
        });

      }
    }
    console.log(data);
    teste =[
    { y: '2016-04-27 23:30:00', humidade: 50, b: 11},
    { y: '2016-04-27 23:42:00', humidade: 65,  b: 20},
    { y: '2016-04-27 23:41:00', humidade: 50,  b: 13},
    { y: '2016-04-27 23:50:00', humidade: 75,  b: 5},
    { y: '2016-04-27 23:52:00', humidade: 80,  b: 13},
    { y: '2016-04-27 22:40:00', humidade: 90,  b: 12},
    { y: '2016-04-27 21:40:00', humidade: 100, b: 10},
    ],
    cenas = ["a","b"]
   //console.log(labels);
   console.log(data);
    //console.log(teste);

    Morris.Line({
      // ID of the element in which to draw the chart.
      element: 'monitor'+dados[0][0].estufa_id,
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
     // resize: true,
     data: data,
     //data: teste,
    // stacked: true,
    // pointSize: 3,
    // hideHover: true,
      // The name of the data record attribute that contains x-values.
      xkey: 'time',
      //xkey: 'y',
      // A list of names of data record attributes that contain y-values.
      ykeys:  labels,
      //ykeys:  ['humidade','b'],
      //xLabels: "5sec",
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      behaveLikeLine:true,
      smooth:false,
      labels: labels
     // labels: ['humidade','b'],
   });
  });
 };

});