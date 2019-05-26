$(document).ready(function () {

    var text = $('.post-content:first-child').children('p:first-child');
    $('.post-content').children().remove();
    $('.post-content').append(text);
});