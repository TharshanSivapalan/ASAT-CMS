var $notifs = $('.notification');

var timeout = 8500;

if ($('.notifications').children().length > 0) {

    setTimeout(function(){
        $('.notification').trigger('click');
    } , timeout);
}


$('.notifications').on('click' , ".notification" ,function(){
    $(this).addClass('fadeOutRight').delay(500).slideUp(300 , function() {
        $(this).remove();
    });
});
