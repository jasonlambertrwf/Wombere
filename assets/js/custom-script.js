

    
        // Loader au 1er chargement page accueil

 $(document).ready(function() {
            if (document.cookie.indexOf("visited") >= 0) {
                $('.loader').addClass('d-none');                 
            }
            else {
                // set a new cookie..
                var cookieExpiry = new Date();
                cookieExpiry.setTime(cookieExpiry.getTime() + (1 * 3600 * 1000)); // 1 heure
                document.cookie = "visited=yes; expires=" + cookieExpiry.toGMTString();
                
                $('.loader').removeClass('d-none');
                $('.loader').addClass('preload-icon');
                function loader(){$('.loader').removeClass('preload-icon').addClass('d-none');}
                setTimeout(loader, 2000);
                
            }
        });


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
    
    

        // class = active when navigating
     $(function() {
            var url = location.origin + location.pathname;
            $('nav a[href^="' + url + '"]')
                .closest('li')
                .addClass('active');
        }); 



            // Scroll Spy via Bootstrap
        $('body').scrollspy({target: "#scrollspy", offset:200});
        // Only fire when not on the homepage
        jQuery(function($){
            // local url of page (minus any hash, but including any potential query string)
            var url = location.href.replace(/#.*/,'');
            // Find all anchors
            $('#scrollspy').find('a[href]').each(function(i,a){
                var $a = $(a);
                var href = $a.attr('href');
                // check is anchor href starts with page's URI
                if (href.indexOf(url+'#') == 0) {
                    // remove URI from href
                    href = href.replace(url,'');
                    // update anchors HREF with new one
                    $a.attr('href',href);
                }
                // Now refresh scrollspy
                $('[data-spy="scroll"]').each(function (i,spy) {
                    $(spy).scrollspy('refresh');
                });
            });
            
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
        

    
        

        /* Sous-menu reste actif au click 
            $('.dropdown-item').click(function() {
                $(this).addClass('active').siblings('.dropdown-item').removeClass('active');
            });
            
            /* $('.nav-link').click(function() {
            $(this).addClass('active').siblings('.nav-link').removeClass('active');
            }); */
            
            
        // Smoothscroll.js
            var scroll = new SmoothScroll('a[href*="#"]', {
                
                ignore: '[data-slide]',
                
                // Speed & Easing
                speed: 1500, // Integer. How fast to complete the scroll in milliseconds
                clip: true, // If true, adjust scroll distance to prevent abrupt stops near the bottom of the page
                
                easing: 'easeInOutCubic', // Easing pattern to use
                offset:100,    
            });

        



        //smooth scroll when juping from one page to another
            $( document ).ready ( function($) {
                
                var hash= window.location.hash
                if ( hash == '' || hash == '#' || hash == undefined ) return false;
                var target = $(hash);
                target = target.length ? target : $('[name=' + hash.slice(1) +']');
                
                if (target.length) {
           // window.scrollTo(0, 0); si on veut que le scroll commence en haut de page
                    $('html,body').stop().animate({
                        scrollTop: target.offset().top - 100 //offsets for fixed header
                    }, 'linear');
                }
            } );
        
        
        // button bak to top
           var scrolled = 400;
           $(window).scroll(function() {
               if ($(window).scrollTop() > scrolled) {
                   $('a.btt').fadeIn('slow');
               } else {
                   $('a.btt').fadeOut('slow');
               }
           });
      
           
    
// navbar border fun 

                $( window ).on( "load", function() {
                    var docHeight = $('body').height(),
                        windowHeight = $(window).height(),
                        scrollPercent;
                    
                    // faire apparaitre la barre au rafrachissement de la page
                    scrollPercent = $(window).scrollTop() / (docHeight - windowHeight) * 101;
                    $('.scroll-progress').width(scrollPercent + '%');
                    
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
                    
                    
                });
                

   

