$("#button_profile").click(function(e){
    e.preventDefault();

    var new_name = $("#form_name").val();
    var new_surname = $("#form_surname").val();
    var new_email = $("#form_email").val();
    var bio = $("#form_bio").val();
    var new_birthdate = $("#form_birthdate").val();

    var dataString = {
        new_name: new_name,
        new_surname: new_surname,
        new_email: new_email,
        bio: bio,
        new_birthdate: new_birthdate,
    }

    $.ajax({
        type: "POST",
        url: "profil/profil-class.php",
        data: dataString,
        success: function(e){
            alert(e);
        },
        error: function (xhr) {
            console.log(xhr.status);
            console.log(xhr.statusText);
            }
    });
});

$('#profil_file_input').on('change', function(e){
    e.preventDefault();

    var file_data = this.files[0];
    var image = new FormData();                  
    image.append('file', file_data);

    $.ajax({
        type: "POST",
        url: "profil/profil-class.php",
        data: image,
        cache       : false,
        contentType : false,
        processData : false,   
        success: function(e){
            $('#info_messages').html(e);
        },
        error: function (xhr) {
            console.log(xhr.status);
            console.log(xhr.statusText);
            }
    });
});

$('#modalProfile').on('hidden.bs.modal', function () {
    location.reload();
   })