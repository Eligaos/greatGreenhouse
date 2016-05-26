 $(function() {
     var pgurl = window.location.href.substr(window.location.href
.indexOf("/")+1);
    pgurl = pgurl.replace("/"+window.location.hostname, "");
   if(pgurl.contains("#")){
   		var res = pgurl.split("#");
   		pgurl = res[0];
   }
     $("#menu-content a").each(function(){

      console.log(pgurl  + " ----" + $(this).attr("href"));
          if($(this).attr("href") == pgurl || pgurl.startsWith($(this).attr("href")) ==true)
          $(this).addClass("active");
     })

 if($('.sub-menu li a').hasClass('active') == true){
	$('.sub-menu').toggleClass('in');
};	


});
     