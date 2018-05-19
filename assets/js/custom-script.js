

// NAVBAR START
    // ***********> affix when LG
         var toggleAffix = function(affixElement, scrollElement, wrapper) {

            var height = affixElement.outerHeight(),
                top = wrapper.offset().top;

            if (scrollElement.scrollTop() >= top) {
                wrapper.height(height);
                affixElement.addClass("affix");
            } else {
                affixElement.removeClass("affix");
                wrapper.height('auto');
            }

        };


        $('[data-toggle="affix"]').each(function() {
            var ele = $(this),
                wrapper = $('<div class="hide-all"></div>');

            ele.before(wrapper);
            $(window).on('scroll resize', function() {
                toggleAffix(ele, $(this), wrapper);
            });

            // init
            toggleAffix(ele, $(window), wrapper);
        });



      // *********>gestion du dropdown on mobile et pas en lg


        if ($('nav').width() > 736) {
            $('#dropdown01').prop('disabled', true);
            $('#dropdown02').prop('disabled', true);
        } else if ($('nav').width() < 736) {
            $('#dropdown01').prop('disabled', false);
            $('#dropdown02').prop('disabled', false);
        }
        
        $( window ).resize(function() {
            if ($('nav').width() > 736) {
            $('#dropdown01').prop('disabled', true);
            $('#dropdown02').prop('disabled', true);
        } else if ($('nav').width() < 736) {
            $('#dropdown01').prop('disabled', false);
            $('#dropdown02').prop('disabled', false);
        }
        });





      

// NAVBAR END

         
      
  // Masonry
       
            // Masonry grid setup
            $('.grid').masonry({
                itemSelector: '.grid__item',
                columnWidth: '.grid__sizer',
                gutter: 15,
                percentPosition: true
            });

            // Image replacement handler
            $(document).on('click', '.js-button', function() {
                var imageSrc = $(this).parents('.grid__item').find('img').attr('src');

                $('.js-download').attr('href', imageSrc);
                $('.js-modal-image').attr('src', imageSrc);

                $(document).on('click', '.js-heart', function() {
                    $(this).toggleClass('active');
                });
            });
        

    
        // *********> navbar border fun 
        var docHeight = $('body').height(),
            windowHeight = $(window).height(),
            scrollPercent;

        $(window).scroll(function() {
            scrollPercent = $(window).scrollTop() / (docHeight - windowHeight) * 101;

            $('.scroll-progress').width(scrollPercent + '%');
        });



        $(window).resize(function() {
            var docHeight = $('body').height(),
                windowHeight = $(window).height(),
                scrollPercent;
            $(window).scroll(function() {
                scrollPercent = $(window).scrollTop() / (docHeight - windowHeight) * 101;

                $('.scroll-progress').width(scrollPercent + '%');
            });

        });
    
    



        // button bak to top
        var scrolled = 400;
        $(window).scroll(function() {
            if ($(window).scrollTop() > scrolled) {
                $('a.btt').fadeIn('slow');
            } else {
                $('a.btt').fadeOut('slow');
            }
        });
   
        $('a.btt').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 1400);
            return false;
        });



    /*********************
    ADMIN start
    ********************/


   