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


var new_images = new Array();
var form = document.getElementById('form');
var imgprev = document.getElementsByClassName("new_images")[0];
var lastImageInput;
var imagesCounter = 0;
document.addEventListener('DOMContentLoaded', function(){
    if(imagesCounter == 0){
        let divInputImage = document.createElement("DIV");
        let divInputFile = document.createElement("DIV");
        let inputImage = document.createElement("INPUT");
        let btnImage = document.createElement("DIV");
        let iconAddImage = document.createElement("I");

        divInputImage.setAttribute("class", "col s3");
        divInputFile.setAttribute("class", "file-field input-field");
        inputImage.setAttribute("type", "file");
        btnImage.setAttribute("class", "btn-large blue");
        inputImage.setAttribute("name", imagesCounter.toString());
        iconAddImage.setAttribute("class", "material-icons");
        iconAddImage.innerHTML = "add";

        btnImage.appendChild(iconAddImage);
        btnImage.appendChild(inputImage);
        divInputFile.appendChild(btnImage);
        divInputImage.appendChild(divInputFile);
        imgprev.appendChild(divInputImage);
        console.log(imgprev.lastChild);
        lastImageInput = imgprev.lastChild;

        //INCREMENTS IMAGE COUNTER
        imagesCounter ++;
    }

    imgprev.querySelector("input[type=file]").addEventListener('change', function(){
        // HIDE INPUT
        lastImageInput.setAttribute("hidden", "");


        //SHOW THE SELECTED IMAGE
        let img = document.createElement("img");
        let divWrapper = document.createElement("div");

        divWrapper.setAttribute("class", "col s3");
        let file = lastImageInput.querySelector("input[type=file]").files[0];
        let reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onloadend = function(){
            img.setAttribute("src", reader.result);
            img.setAttribute("class", "responsive-img" );
            divWrapper.appendChild(img);
        }

        imgprev.appendChild(divWrapper);


        //ADD A NEW IMAGE INPUT
        let divInputImage = document.createElement("DIV");
        let divInputFile = document.createElement("DIV");
        let inputImage = document.createElement("INPUT");
        let btnImage = document.createElement("DIV");
        let iconAddImage = document.createElement("I");

        divInputImage.setAttribute("class", "col s3");
        divInputFile.setAttribute("class", "file-field input-field");
        inputImage.setAttribute("type", "file");
        btnImage.setAttribute("class", "btn-large blue");
        inputImage.setAttribute("name", imagesCounter.toString());
        iconAddImage.setAttribute("class", "material-icons");
        iconAddImage.innerHTML = "add";

        btnImage.appendChild(inputImage);
        btnImage.appendChild(iconAddImage);
        divInputFile.appendChild(btnImage);
        divInputImage.appendChild(divInputFile);
        imgprev.appendChild(divInputImage);
        console.log(imgprev.lastChild);
        lastImageInput = imgprev.lastChild;


        //INCREMENTS IMAGE COUNTER
        imagesCounter ++;
        console.log(imagesCounter);

    });

});
