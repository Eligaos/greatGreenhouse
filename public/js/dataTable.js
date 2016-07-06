 $(function() {
  $('#dataTable').DataTable({
    "paging":   false,
    "info":     false,
    "searching":   true,
    "order":  [[ 0, 'desc' ]],
    "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ],
     "language": {
        search: "Pesquisar"
    }
  });


 });
 