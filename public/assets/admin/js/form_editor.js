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

    var elems = document.querySelectorAll('select');

    var instances = M.FormSelect.init(elems, {
        dropdownOptions: {
            alignment: 'left',
            coverTrigger: false
        }

    });

    console.log(instances[0].dropdownOptions);

    document.querySelector("#imagesInput").addEventListener("change", handleImageSelect, false);

    document.querySelector("#filesInput").addEventListener("change", handleFileSelect, false);

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
});
