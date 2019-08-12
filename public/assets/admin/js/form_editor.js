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

ClassicEditor
    .create(document.querySelector('#abstract'), {
        toolbar: ['heading', '|', 'bold', 'italic'],
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

document.addEventListener('DOMContentLoaded', function () {
    var tooltipedElems = document.querySelectorAll('.tooltipped');
    var tooltipedInstances = M.Tooltip.init(tooltipedElems);

    var elems = document.querySelectorAll('select');

    var instances = M.FormSelect.init(elems, {
        dropdownOptions: {
            alignment: 'left',
            coverTrigger: false
        }

    });

    var videoCounter = 1;

    document.querySelector("#imagesInput").addEventListener("change", handleImageSelect, false);

    document.querySelector("#filesInput").addEventListener("change", handleFileSelect, false);

    document.querySelector("#buttonAddVideo").addEventListener("click", handleVideoInsert, false);

    function handleImageSelect(evt) {
        document.getElementById('image-preview').innerHTML = "";
        var files = evt.target.files;

        // FileList object
        for (var i = 0, f; f = files[i]; i++) {

            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {

                    // Render thumbnail.
                    var div = document.createElement('div');
                    div.classList.add("col");
                    div.classList.add("m3");
                    div.innerHTML = [
                        '<img class="responsive-img" src="',
                        e.target.result,
                        '"/>'
                    ].join('');

                    document.getElementById('image-preview').insertBefore(div, null);
                    i++;
                };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    function handleFileSelect(evt) {
        document.getElementById('files-preview').innerHTML = "";
        var files = evt.target.files;

        // FileList object
        for (var i = 0, f; f = files[i]; i++) {

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {

                    var fullPath = document.getElementById('filesInput').value;
                    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                    var filename = fullPath.substring(startIndex);
                    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                        filename = filename.substring(1);
                    }
                    // Render thumbnail.
                    var li = document.createElement('li');
                    li.classList.add("collection-item");
                    li.innerHTML = [
                        filename
                    ].join('');

                    document.getElementById('files-preview').insertBefore(li, null);
                    i++;
                };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    function handleVideoInsert(evt){
        let currentVideoLink = document.getElementById('videoInput').value;

        if(currentVideoLink != "") {
            //remove eventuais mensagens de erro
            document.getElementById("videoInput").style =
                "border-bottom: 1px solid #000;" +
                "box-shadow: 0 1px 0 0 #000;";
            document.getElementById("videoInput").placeholder = "Digite um link.";

            //cria o elemento de lista e adiciona a classe do materialize para coleções
            let li = document.createElement("li");
            li.classList.add("collection-item");
            li.setAttribute("id", "videoWrapper" + videoCounter);
            //adiciona o input com o link do vídeo dentro do item de lista
            li.innerHTML = [
                '<div class="row valign-wrapper">' +
                '<div class="col s10">' +
                '<input name="video' + videoCounter + '" value="' + currentVideoLink + '"/>' +
                '</div>' +
                '<div class="col s2">' +
                '<span>' +
                '<a href="#!" class="videoRemove" id="link'+ videoCounter +'"><i id="' + videoCounter +'" class="red-text small material-icons">delete</i></a>' +
                '</span>' +
                '</div>' +
                '</div>'
            ].join('');

            //insere o li dentro do ul
            document.getElementById('videos-preview').insertBefore(li, null);

            //limpa o link do input principal
            document.getElementById('videoInput').value = "";

            //adiciona o listener no botão de excluir
            document.getElementById('link' + videoCounter.toString()).addEventListener("click", handleVideoDelete, false);

            videoCounter++;

        }else{
            document.getElementById("videoInput").style =
                "border-bottom: 1px solid red;" +
                "box-shadow: 0 1px 0 0 red;";
            document.getElementById("videoInput").placeholder = "Digite um link válido.";
        }
    }

    function handleVideoDelete(evt) {
        let videoId = evt.target.id;
        document.getElementById("videoWrapper" + videoId).remove();//.remove();
    }
});
