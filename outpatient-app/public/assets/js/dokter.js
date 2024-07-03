// Image Preview
$(document).ready(function (e) {
    let imagePreview = $('#uploadedAvatar');
    let imageInput = $('#upload');
    let imageReset = $('#imageReset');

    // preview image
    imageInput.change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0])
    })

    // reset image
    imageReset.click(function () {
        imagePreview.attr('src', '/assets/img/avatars/1.png');
        imageInput.val('');
    })
});

