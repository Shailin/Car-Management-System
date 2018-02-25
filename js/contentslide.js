
    function Selecttab(n){
      if (n==1 ){
        $(".tabHr").animate({marginLeft:'0px'},300);
      }
      else if (n==2) {
        $(".tabHr").animate({marginLeft:'250px'},300);
      }
      else if (n==3) {
        $(".tabHr").animate({marginLeft:'500px'},300);
      }
      else if (n==4) {
         $(".tabHr").animate({marginLeft:'750px'},300);
      }


         $(".content_switcher").hide();
         $("#content"+n).show();
    }

   /*
   $("a.tab1").click(function()
            {
                $(".content_switcher .active").removeClass("active");
                $(this).addClass("active");
            });
   */