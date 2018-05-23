    <div class="w-100" style="background-image: linear-gradient(to right, blue 0, blue 33.33%, white 33.33%,white 66.66%, red 66.66%, red 100%); height:3px;"></div>
    
    <!-- FOOTER start -->
    
    <div class="footer">
        <div class="container">
           <!-- <div class="row">
                
                
                
                

            <div class="col-2 offset-2 my-5 ">
                <div class="">
                    <i class="fa fa-map-marker"></i>
                </div>
                <p>
                    <strong>Local Wombere</strong> <br>
                    81800 Rabastens<br>
                </p>
            </div>
            <div class="col-4 my-5 d-flex flex-column">
                <div class="mx-auto">
                    <p>Nous trouver</p>
                </div>
                
                  
            </div>
            <div class="col-4 my-5">
                <div class="">
                    <i class="fa fa-phone"></i>
                </div>
                <p>
                <strong>Contact</strong> <br>
                    Tél : XX XX XX XX XX <br>
                    Mail&nbsp;:&nbsp;wombere@gmail.com
                </p>
            </div>
        </div>-->
         <div class="row">
                <div class="col-12 d-flex flex-row justify-content-around my-5">
                    <p>Qui sommes-nous?</p>
                     <p>Contact</p>
                    <p>Wombere 2006 - 2018</p>
                    <p>Plan du site</p>
                    
                </div>        
            
        </div>
    </div>
    </div>
    
    <!-- scroll back to top button -->
    <a href="#" class="btt"><i class="fa fa-chevron-up"></i></a>
    <!-- end of back to top button -->

    
    
    <!--<div class="col-10 offset-1 d-flex flex-row justify-content-around mt-5">
                    <a href="">Qui sommes-nous?</a>
                    <a href="">Espace Presse</a>
                    <a href="">Mentions Légales</a>
                    <a href="">Contactez nous</a>
                </div>
            </div>-->
    <!-- FOOTER end -->
    
    

    <!-- script start -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js">
    </script>
    
    <script> AOS.init({
      disable: 'mobile'
    });</script>

    <!-- script perso start -->
    <script>
        //gestion du dropdown on mobile et pas en lg
         
             
       if ($('nav').width() > 736 ){
            $('#dropdown01').prop('disabled',true);
           $('#dropdown02').prop('disabled',true);
}
       else if($('nav').width() < 736 ){
          $('#dropdown01').prop('disabled',false);
           $('#dropdown02').prop('disabled',false);
       }


        
    </script>
    
    <script> // affix when LG


  var toggleAffix = function(affixElement, scrollElement, wrapper) {

    var height = affixElement.outerHeight(),
        top = wrapper.offset().top;

    if (scrollElement.scrollTop() >= top){
        wrapper.height(height);
        affixElement.addClass("affix");
    }
    else {
        affixElement.removeClass("affix");
        wrapper.height('auto');
    }

  };


  $('[data-toggle="affix"]').each(function() {
    var ele = $(this),
        wrapper = $('<div></div>');

    ele.before(wrapper);
    $(window).on('scroll resize', function() {
        toggleAffix(ele, $(this), wrapper);
    });

    // init
    toggleAffix(ele, $(window), wrapper);
  });    </script>
    
   
   
   
   <script type='text/javascript'>
    
         $('.carousel').carousel({
             interval: 4000
         })
       
</script>
   
   
   
   <script>     //navbar border fun
      var docHeight = $(document).height(),
      windowHeight = $(window).height(),
      scrollPercent;

      $(window).scroll(function() {
        scrollPercent = $(window).scrollTop() / (docHeight - windowHeight) * 101;

        $('.scroll-progress').width(scrollPercent + '%');
        });
        </script>
        
        
        <script>

  $('.navbar-collapse').on('show.bs.collapse', function() {

  $('body').css('overflow', 'hidden');
});
            
            $('.navbar-collapse').on('hidden.bs.collapse', function() {

  $('body').css('overflow', 'auto');
});
 
</script>
   
   
   
     <script> // button bak to top
        var scrolled = 400;
        $(window).scroll(function() {
            if ($(window).scrollTop() > scrolled) {
                $('a.btt').fadeIn('slow');
            } else {
                $('a.btt').fadeOut('slow');
            }
        });
    </script>
    <script>
        $('a.btt').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 1400);
            return false;
        });
    </script>
    
   
    <!-- script perso end -->
    
    
    <!-- script end -->
</body>

</html>