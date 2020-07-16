$(document).ready(function(){

    $('#banner_file_input').on('change', function() {
                
        var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#banner_image_upload').css('background-image', 'url("' + reader.result + '")');
            $('.background_picture_info_profil').css('background-image', 'url("' + reader.result + '")');

        }
        reader.readAsDataURL(file);
    });

});