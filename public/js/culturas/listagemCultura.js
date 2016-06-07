


    /* var rows = $('table#table >tbody >tr');
    var rowCount = $('table#table >tbody >tr').length;
    var items = [],
    itemtext = [],
    currGroupStartIdx = 0;

    $.each(rows,function(i){
      var $this = $(this);
      var itemCell = $(this).find('td:eq(0)')
      var item = itemCell.text();
      console.log(itemCell);
      $("#tEstufa").remove();
      itemCell.remove();
      if ($.inArray(item, itemtext) === -1) {
        itemtext.push(item);
        items.push([i, item]);
        groupRowSpan = 2;
        currGroupStartIdx = i;
        $this.data('rowspan', 1)
      } else {
        var rowspan = rows.eq(currGroupStartIdx).data('rowspan') + 1;
        rows.eq(currGroupStartIdx).data('rowspan', rowspan);
      }
    });

    $.each(items, function(i) {
      var row = rows.eq(this[0]);
      var rowspan = row.data('rowspan');
      if(rowspan==1){
        row.prepend('<th rowspan="' + rowspan +  '"style="text-align: center" class="col-xs-6 col-sm-5 col-md-2" >' + this[1]+ "Nome da Estufa" + '</th>');
      }else{
        row.prepend('<td rowspan="' + rowspan + '">' + this[1] + '</td>');
      }
    });
    */
