$(document).ready(function(){
    $(".dropdown-trigger").dropdown({
        coverTrigger: false
    });

    $(".materialboxed").materialbox();

    $('.tooltipped').tooltip();

});

ClassicEditor
    .create( document.querySelector( '#content' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'alignment', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Parágrafo', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Título 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Título 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );


document.addEventListener("DOMContentLoaded", function(){

    document.getElementByName('image[]').addEventListener('change', handleFileArray, false);


    function handleFileArray(evt){
           
    }
})