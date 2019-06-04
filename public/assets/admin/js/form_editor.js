ClassicEditor
    .create(document.querySelector('#content'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        heading: {
            options: [
                {model: 'paragraph', title: 'Parágrafo', class: 'ck-heading_paragraph'},
                {model: 'heading1', view: 'h1', title: 'Título 1', class: 'ck-heading_heading1'},
                {model: 'heading2', view: 'h2', title: 'Título 2', class: 'ck-heading_heading2'}
            ]
        }
    })
    .catch(error => {
        console.log(error);
    });

var images = new Array();
$(document).ready(function () {

    var imagesInput = document.getElementById("images");
    $("#images").change(function () {
        handleFileChange(imagesInput);
        showImages();
        console.log(images);
    });
    $("#submit").click(function (e) {
        sendForm(e);
    });

});

function handleFileChange(imagesInput) {
    let files = imagesInput.files;
    for (let i = 0; i < files.length; i++) {
        this.images.push(files[i]);
    }
}

function showImages() {
    for(let i=0; i<images.length ; i++){
        let file = images[i];
        var reader = new FileReader();
        let imgprev = document.getElementsByClassName("images-preview");
        var img = document.createElement("img");
        reader.onloadend = function(){
            img.src = reader.result;
            img.setAttribute("class", "col s3 responsive-img" );
        }
        reader.readAsDataURL(file);
        imgprev[0].appendChild(img);
    }
}


function sendForm(evt) {
    evt.preventDefault();
    evt.stopPropagation();
    let =
}
