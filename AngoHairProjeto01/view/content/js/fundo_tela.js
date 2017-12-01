$(document).ready(function(){
    
    $("#team").hide();
       
    $(".Team_f").click(function(){
			
    $("#team").slideDown(3000);
		});
		
  //Slide_Page
    $(".slider").cycle();

    var nav = $('.navbar');   
    $(window).scroll(function () { 
        if ($(this).scrollTop() > 700) { 
            nav.css("background-color","#000");
        } else { 
            nav.css("background-color","transparent");
        } 
    });	
    
    //Validacão
    $( "#validar" ).submit(function() {
        return this.some_flag_variable;
      });
    
         
});