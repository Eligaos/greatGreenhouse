 $(function() {
  $('#dataTable').DataTable({
    "paging":   false,
    "info":     false,
    "searching":   false,
    "order":  [[ 0, 'desc' ]],
    "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
  });
 });
 