$(function() {

 $.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});

 $.get("/admin/leituras/getLastHoursLeituras", function( dados ) {

 }).done(function(dados){
  var data = [];

  for (var i =0; i < dados.length; i++) {
    console.log(dados[i].data);
        console.log(dados[i].valor);
    data.push({
      time: dados[i].data,
      value: dados[i].valor
    });

  }

   new Morris.Line({
      // ID of the element in which to draw the chart.
      element: 'monitor1',
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.

      data: data,
      /*
      data: [
        { year: '2008', value: 20 },
        { year: '2009', value: 10 },
        { year: '2010', value: 5 },
        { year: '2011', value: 5 },
        { year: '2012', value: 20 }
        ],*/
      // The name of the data record attribute that contains x-values.
      xkey: 'time',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['value'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['Value']
    });
});
 


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