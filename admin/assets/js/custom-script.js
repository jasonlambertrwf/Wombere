/*************************************************
            ADMIN SCRIPT
*************************************************/



 // Script pour afficher taille réeele de l'image en espace admin
$( document ).ready(function() {
$('img').not($('.logo')).hover(
    function(){
        var that = $(this),
            
            h = Math.round(this.naturalHeight),
            w = Math.round(this.naturalWidth);
        $('<div />')
            .text('Taille réelle de l\'image : \n  Hauteur: ' + h + 'px \n Largeur: ' + w +' px.')
            .insertAfter(that)
        .css({
    position: 'absolute',
    top: '20%',
    left: '1em',
    fontSize: '10px',
    whiteSpace: 'pre-wrap',
    zIndex: '500',
    border: '.2px solid gray',
    padding: '2px',
    backgroundColor : 'white'
});
    },
    function(){
        $(this).next('div').remove();
    });
    
    });    
    


// VALIDATE INPUT FILE
$(function(){
    var fileInput = $('.input-file');
    var maxSize = fileInput.data('max-size');
    $('.upload-form').submit(function(e){
        if(fileInput.get(0).files.length){
            var fileSize = fileInput.get(0).files[0].size; // in bytes
            if(fileSize>maxSize){
                alert('Attention, la taille du fichier est superieur à 1MB! \n N\'oubliez pas de la compresser !');
                return false;
            }else{
            }
        }else{
            return false;
        }

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
   