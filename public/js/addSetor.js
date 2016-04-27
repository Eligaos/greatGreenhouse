"use strict";
$(document).ready(function() {
    
    console.log(lista);
    $("#add_row").on("click", function() {
        addDynamicRows($('.tab_logic').eq(0));
    });

    // add first row
  /**  $('.tab_logic').each(function(){
        addDynamicRows($(this));
    });**/
    
    // Sortable Code
   /* var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();

        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });

        return $helper;
    };*/

    /*$(".table-sortable tbody").sortable({
        helper: fixHelperModified
    }).disableSelection();

    $(".table-sortable thead").disableSelection();*/

});

function addDynamicRows(table){
    // Dynamic Rows Code

    // Get max row id and set new id
    var newid = 0;
    $.each(table.find("tr"), function() {
        if (parseInt($(this).data("id")) > newid) {
            newid = parseInt($(this).data("id"));
        }
    });
    newid++;

    var tr = $("<tr></tr>", {
        id: "addr"+newid,
        "data-id": newid
    });

    // loop through each td and create new elements with name of newid
    $.each(table.find("tbody tr:nth(0) td"), function() {
        var cur_td = $(this);

        var children = cur_td.children();

        // add new td and element if it has a name
        if ($(this).data("name") != undefined) {
            var td = $("<td></td>", {
                "data-name": $(cur_td).data("name")
            });

            var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                   
                   console.log($(cur_td).data("name"));

                   if($(cur_td).data("name") == "nomeSetor[]"){

                    c.val(lista[0].nome);
                   }else if($(cur_td).data("name") == "descricaoSetor[]"){
                        c.val(lista[0].descricao);

                   }

        
            c.attr("name", $(cur_td).data("name") + newid);

            c.appendTo($(td));
            td.appendTo($(tr));
        } else {
            var td = $("<td></td>", {
                'text': table.find('tr').length
            }).appendTo($(tr));
        }
    });

    // add the new row
    $(tr).appendTo(table);

    $(tr).find("td button.row-remove").on("click", function() {
        $(this).closest("tr").remove();
    });
}
