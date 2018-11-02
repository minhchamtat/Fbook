var clone = {}

function changeFile(event) {
    var customFile = document.getElementById('customFile');
    var val = customFile.value;
    var last = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
    switch(last){
        case 'gif': case 'jpg': case 'png': case 'gif' : case 'bmp': case '' :
            break;
        default:
            customFile.value = '';
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Not an image!',
            });
            break;
    };

    var fileElement = event.target;
    if (fileElement.value === '') {
        document.getElementById('custom').appendChild(clone[fileElement.id]);
        customFile.parentNode.removeChild(customFile);

    }
    var path = document.getElementById('customFile').value;
    document.getElementById('label').innerHTML = path;
}

function clickFile(event) {
    var fileElement = event.target;
    if (fileElement.value != '') {
        clone[fileElement.id] = fileElement.cloneNode(true);
    }
}

jQuery(document).ready(function() {
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.img-book').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#customFile').change(function() {
        readURL(this);
    });

    $('#cancel').click(function() {
        $('#label').text('');
        $('.img-book').attr('src', '');
    })
});
