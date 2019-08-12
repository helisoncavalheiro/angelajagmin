document.addEventListener("DOMContentLoaded", function (){
    var carouselElem = document.querySelectorAll('.carousel');
    var c = M.Carousel.init(carouselElem, {
        indicators: true,
        fullWidth: true
    });
    document.getElementById("slider-button-left").addEventListener("click", function () {
        c[0].prev();
    }, false);

    document.getElementById("slider-button-right").addEventListener("click", function () {
        if (c[0].images.length > 1) {
            c[0].next();
        }
    }, false);

    var materialBoxedElems = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(materialBoxedElems, {});

});
