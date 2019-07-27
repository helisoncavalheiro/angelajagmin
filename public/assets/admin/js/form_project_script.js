ClassicEditor
    .create(document.querySelector('#description'), {
        toolbar: ['bold', 'italic'],
    })
    .catch(error => {
        console.log(error);
    });

document.addEventListener("DOMContentLoaded", function () {

    document.querySelector("#imageInput").addEventListener("change", handleFileChange, false);

    function handleFileChange(evt) {

        document.getElementById("image-preview").innerHTML = "";
        var files = evt.target.files;

        for (var i = 0, f; f = files[i]; i++) {

            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    console.log('entrou');
                    // Render thumbnail.
                    var div = document.createElement('div');
                    div.classList.add("col");
                    div.classList.add("m9");
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
});
