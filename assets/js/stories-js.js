$(document).ready(function() {
    var docWidth = $('body').width(),
        slidesWidth = $('.wishlist__post').width(),
        $images = $('.wishlist__post');
    $(document).on('mousemove', function(e) {
        var mouseX = e.pageX,
            offset = mouseX / docWidth * slidesWidth - mouseX / 2;
        $images.css({
            '-webkit-transform': 'translate3d(' + -offset + 'px,0,0)',
            'transform': 'translate3d(' + -offset + 'px,0,0)'
        });
    });
});