"use strict";
$(document).ready(function() {
    $("#add_row").on("click", function() {
        addNewRow($('.tab_logic').eq(0));
    });

    $('.tab_logic').each(function(){
        var a = lista.length;
        if(lista.length!=0){
            for(var i=0; i<lista.length; i++){
                addDynamicRows($(this),i);
            }
        }
    });
    
    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();

        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });

        return $helper;
    };

 /*   $(".table-sortable tbody").sortable({
        helper: fixHelperModified
    }).disableSelection();

    $(".table-sortable thead").disableSelection();
    */
});

function addDynamicRows(table,i){
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

          //  console.log($(cur_td).data("name"));
          if(lista.length != 0){
              editTable(i, cur_td, c);          
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


function editTable(i,cur_td,c){
    if($(cur_td).data("name") == "nomeSetor[]"){
        c.val(lista[i].nome);
    }else if($(cur_td).data("name") == "descricaoSetor[]"){
        c.val(lista[i].descricao);
    }else if($(cur_td).data("name") == "idSetor[]"){
        c.val(lista[i].id);
    }
}

function addNewRow(table){
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
