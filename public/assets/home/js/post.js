$(document).ready(function () {
    var elem = $('.carousel').carousel({
        indicators : true,
    });
    var c = M.Carousel.getInstance(elem);
    
    $('#slider-button-left').click(function () {
        c.prev();
    });

    $('#slider-button-right').click(function () {
        c.next();
    });
    


});