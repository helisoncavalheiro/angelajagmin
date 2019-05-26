$(document).ready(function(){
    $(".dropdown-trigger").dropdown({
        coverTrigger: false
    });

    $(".materialboxed").materialbox();

    $('.tooltipped').tooltip();

});

document.addEventListener("DOMContentLoaded", function(){

    document.getElementByName('image[]').addEventListener('change', handleFileArray, false);


    function handleFileArray(evt){
           
    }
});