$(document).ready(function () {

    $('.post-content').each(function () {
       let fc = $(this).children('p:first-child');
       $(this).children().remove();
       $(this).append(fc);
    });


});