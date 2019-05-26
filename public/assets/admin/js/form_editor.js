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
var images = new Array();
$(document).ready(function () {

    var imagesInput = document.getElementById("images");
    $("#images").change(function () {
        handleFileChange(imagesInput);
        console.log(images);
    })

    /*
    $("#postForm").submit(function(event) {
        event.preventDefault();
        $("#images").val(images);
    });
    */
});

function handleFileChange(imagesInput){
    let files = imagesInput.files;
    for(let i = 0; i<files.length ;i++){
        this.images.push(files[i]);
    }
}
