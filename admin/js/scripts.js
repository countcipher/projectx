    //for getting dimensions***********************************************
    /*function getDimensions(){
        var width = document.getElementById("width");
        var height = document.getElementById("height");
        var w = window.innerWidth;
        var h = window.innerHeight;

        width.innerHTML = "Width: " + w + "px";
        height.innerHTML = "Height: " + h + "px";
    };*/
    //end of getting dimensions********************************************
        
    /**********************************
    Make hamburger open and close menu
    ***********************************/
    var hamburger = document.getElementById("hamburger");
    var hamburger_io = 0;
    var menu = document.getElementById("menu");
        
    hamburger.onclick = function(){
      
        if(hamburger_io == 0){
            $("#menu").slideDown();
            hamburger_io = 1;
        }else{
            $("#menu").slideUp();
            hamburger_io = 0;
        }
        
    };
        
   /********************************
   Make nav menu visible beyond 705px
   ********************************/ 
    function menu_restore(){
      
        if(window.innerWidth >= 706){
            menu.style.display = "block";
            hamburger_io = 0;
        }else{
            menu.style.display = "none";
            hamburger_io = 0;
        }
        
    };
        
    /*******************************
    TOGGLE SECTIONS SECTION
    ********************************/
    $("#hero_section_toggler").click(function(){
        
       $("#hero_toggle_div").toggle("fast", "linear");
        
    });
        
    $("#about_section_toggler").click(function(){

        $("#about_toggle_div").toggle("fast", "linear");
        
    });
        
    $("#team_section_toggler").click(function(){

        $("#team_toggle_div").toggle("fast", "linear");
        
    });

    $("#portfolio_section_toggler").click(function(){

        $("#portfolio_toggle_div").toggle("fast", "linear");
        
    });