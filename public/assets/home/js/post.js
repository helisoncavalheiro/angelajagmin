$(document).ready(function () {
    var elem = $('.carousel').carousel({
        indicators : true,
    });
    var c = M.Carousel.getInstance(elem);

    $('#slider-button-left').click(function () {
        c.prev();
    });

    $('#slider-button-right').click(function () {
        if (c.length > 1) {
            c.next();
        }
    });

    var elems = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(elems, {});


});
