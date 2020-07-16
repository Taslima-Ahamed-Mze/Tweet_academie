function tweet(){

    var href = $(location).attr('href');
    var member = href.substring(
        href.lastIndexOf("?") + 1, 
        href.lastIndexOf("=")
    );
    var id_member = href.substring(
        href.lastIndexOf("=") + 1, 
        href.lastIndexOf("#")
    );

    console.log(id_member)
    $.ajax({
        type: "POST",
        url: "profil/user-class_ajax.php",
        data: {function: "getTweet", member: member, id_member: id_member},
        success: function(html){
            $('.div_fil_actu').html(html);
        },
        error: function (xhr) {
            console.log(xhr.status);
            console.log(xhr.statusText);
        }
    });
};

function reply(){

    var href = $(location).attr('href');
    var member = href.substring(
        href.lastIndexOf("?") + 1, 
        href.lastIndexOf("=")
    );
    var id_member = href.substring(
        href.lastIndexOf("=") + 1, 
        href.lastIndexOf("#")
    );

    $.ajax({
        type: "POST",
        url: "profil/user-class_ajax.php",
        data: {function: "getReply", member: member, id_member: id_member},
        success: function(html){
            $('.div_fil_actu').html(html);
        },
        error: function (xhr) {
            console.log(xhr.status);
            console.log(xhr.statusText);
        }
    });
};

function media(){

    var href = $(location).attr('href');
    var member = href.substring(
        href.lastIndexOf("?") + 1, 
        href.lastIndexOf("=")
    );
    var id_member = href.substring(
        href.lastIndexOf("=") + 1, 
        href.lastIndexOf("#")
    );

    $.ajax({
        type: "POST",
        url: "profil/user-class_ajax.php",
        data: {function: "getMedia", member: member, id_member: id_member},
        success: function(html){
            $('.div_fil_actu').html(html);
        },
        error: function (xhr) {
            console.log(xhr.status);
            console.log(xhr.statusText);
        }
    });
};

function like(){

    var href = $(location).attr('href');
    var member = href.substring(
        href.lastIndexOf("?") + 1, 
        href.lastIndexOf("=")
    );
    var id_member = href.substring(
        href.lastIndexOf("=") + 1, 
        href.lastIndexOf("#")
    );

    $.ajax({
        type: "POST",
        url: "profil/user-class_ajax.php",
        data: {function: "getLike", member: member, id_member: id_member},
        success: function(html){
            $('.div_fil_actu').html(html);
        },
        error: function (xhr) {
            console.log(xhr.status);
            console.log(xhr.statusText);
        }
    });
};

