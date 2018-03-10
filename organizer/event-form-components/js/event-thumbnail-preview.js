$(document).ready(function (e) {

    $("#event-thumbnail").change(function () {
        console.log("onFileChange");
        previewPicture(this);
    });

    function previewPicture(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $("#image-viewer").attr('src', e.target.result);
                $("#image-viewer").show();
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            $("#image-viewer").attr('src', '');
            $("#image-viewer").hide();
        }
    }
});