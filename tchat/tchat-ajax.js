//MESSAGERIE
$('.button_envoie_message').click(function(e){
    e.preventDefault();

    var id_recois = $('#id_recois').val();
    var message = $('#message').val();
   
    var day = new Date().toLocaleDateString("fr-FR");
    var d = new Date();
    var time = d.toLocaleTimeString();

    var date = day + " " + time;

    if(message != ""){ 
        
        $.ajax({
            url : "tchat/traitement_message.php",
            type : "POST", 
            data : "id_recois=" + id_recois + "&message=" + message
        });
    }
});


//ENVOIE IMAGE
$('#file').on('change', function(e){
    e.preventDefault();

    var id_recois = $('#id_recois').val();

    var file_data = this.files[0];
    var image = new FormData();                  
    image.append('file', file_data);

    $.ajax({
        type: "POST",
        url: "tchat/traitement_message_image.php",
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


function charger(){

    setTimeout( function(){
        
        var id_recois = $('#id_recois').val();
        
        $.ajax({
            url : "tchat/charger.php?id="+id_recois,
            type : "GET",
            success : function(html){
                //discussion = $('.content_discussion');
                discussion= document.getElementsByClassName('div_tchat')[0];
                discussion.innerHTML=html;
            }
        });

        charger();

    },2000);

}
charger();