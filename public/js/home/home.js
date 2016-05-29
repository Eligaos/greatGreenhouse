$(function() {
  for (var j = 0; j <  estufas.data.length; j++) {

   $.get("/admin/leituras/ultimas/"+estufas.data[j].id, function(dados) {

   }).done(function(dados){
    /*var data = [];

    for (var i =0; i < dados.length; i++) {
      data.push({
        time: dados[i].data,
        value: dados[i].valor 
      });

    }*/
    console.log(dados);
    new Morris.Line({
      // ID of the element in which to draw the chart.
      element: 'monitor'+dados[0].estufa_id,
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      resize: true,
      data: dados,
      // The name of the data record attribute that contains x-values.
      xkey: 'data',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['valor'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      postUnits: dados[0].unidade,
      labels: [dados[0].parametro]

    });
    
  });
 }


/*
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'monitor2',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'monitor3',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});*/

});