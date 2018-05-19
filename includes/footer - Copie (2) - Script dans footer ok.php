<!-- FOOTER start -->


    <div class="w-100 footer-hr"></div>



    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-10 d-flex flex-wrap justify-content-around my-5">
                    <p>Qui sommes-nous?</p>
                    <p>Contact</p>
                    <p>Wombere 2006 - 2018</p>
                    <p>Plan du site</p>

                </div>
                <div class="social-logo col-2 align-self-center d-block d-md-none">
                    <a href=""><i class="fab fa-facebook-square fa-2x mr-2"></i></a>
                    <a href=""><i class="fab fa-twitter-square fa-2x mr-2"></i></a>
                    <a href=""><i class="fab fa-youtube-square fa-2x"></i></a>
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
    <script src="assets/js/masonry.pkgd.min.js"></script>

    <script>
        AOS.init({
            disable: 'mobile'
        });
    </script>

    <!-- script perso start -->
    <script>
        //gestion du dropdown on mobile et pas en lg


        if ($('nav').width() > 736) {
            $('#dropdown01').prop('disabled', true);
            $('#dropdown02').prop('disabled', true);
        } else if ($('nav').width() < 736) {
            $('#dropdown01').prop('disabled', false);
            $('#dropdown02').prop('disabled', false);
        }

        $(window).resize(function() {
            if ($('nav').width() > 736) {
                $('#dropdown01').prop('disabled', true);
                $('#dropdown02').prop('disabled', true);
            } else if ($('nav').width() < 736) {
                $('#dropdown01').prop('disabled', false);
                $('#dropdown02').prop('disabled', false);
            }
        });
    </script>

    <script>
        // affix when LG


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
    </script>




    <script type='text/javascript'>
        $('.carousel').carousel({
            interval: 4000
        })
    </script>


    <script>
        // Masonry
        (function() {
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
        })();
    </script>


    <script>
        //navbar border fun
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
    </script>


    <script>
        /*  $('.navbar-collapse').on('show.bs.collapse', function() {

                    $('body').css('overflow', 'hidden');
                });

                $('.navbar-collapse').on('hidden.bs.collapse', function() {

                    $('body').css('overflow', 'auto'); */
        });
    </script>



    <script>
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
    </script>





    <!-- script perso end -->


    <!-- script end -->
</body>

</html>