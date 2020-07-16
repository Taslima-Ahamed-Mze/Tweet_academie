$('#file_tweet').on('change', function(e){

    var file_data = this.files[0];
    var image_ = new FormData();                  
    image_.append('file', file_data);

    if (this.files) {
        [].forEach.call(this.files, readAndPreview);
    }
    
    function readAndPreview(file) {
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            var imagee = new Image();
            imagee.height = 100;
            imagee.src = this.result;


            $('.form_input_tweet').css("height", "170px");
            $('.preview_picture').css("height", "100px");
            $('.preview_picture').css("margin-top", "10px");
            $('.preview_picture').css("margin-bottom", "10px");
            $('.preview_picture').css("width", "max-content");
            $('.preview_picture').css("float", "right");
            $('.input_tweet').css("width", "70%");

            $('.preview_picture').append(imagee)

        });
        
        reader.readAsDataURL(file);
   
        
    }
});



$('.button_tweeter').click(function(e){
    e.preventDefault();

    var id_autor = $('#id_autor').val();
    var name = $('#name_autor').val();
    var pseudo =  $('#pseudo_autor').val();
    var message = $('#content_tweet').val();
    var profile_picture = $('#picture').val();
    image=$('.input-file-tweet').val()
    var day = new Date().toLocaleDateString("fr-FR");
    var d = new Date();
    var time = d.toLocaleTimeString();

    var date = day + " " + time;
    var new_message="";



    if((message != "") && (image==="")){ 

        $.ajax({
            url : "tweet/traitement_tweet.php",
            type : "POST",
            data : "id_autor=" + id_autor + "&message=" + message,
            success:function(html){
                //console.log(html);
                $('.div_fil_actu').append(
                    '<div class="new_tweet">' +
                        '<div class="mini_photo_profil_session"></div>' + 
                            '<div class="titre_contenu_tweet">'+
                                 
                                '<p>'+
                                '<span class="p_nom_tweet">'+'<b>'+ name +'</b> '+ '<span style="color:grey;">'+'@'+pseudo +' - '+ date + '</span></span>' +
                                    '<br>' +
                                    '<span class="contenu_tweet">'+
                                        html +   
                                    '</span>'+
                                '</p>' +
        
                                '<div class="buttons_tweet">' +
                                    '<button class="button_reaction_tweet"><i class="far fa-heart"></i></button>' +
                                    '<button class="button_reaction_tweet" id="comment"><i class="far fa-comment"></i></button>' +
                                    '<button class="button_reaction_tweet"><i class="fas fa-retweet"></i></button>' +
                                '</div>' +
         
                            '</div>' +
                        '</div>' +
                    '</div>');

                //new_message=html;
            }
        });
    }

    
    if((message !="") && (image!="")){ 
        
        var file_data = this.file;
        input = document.getElementById('file_tweet')
        form = new FormData(($('.form_input_tweet')[0]))
        
        //alert($('.input-file-tweet').val())
        fakePath = $('.input-file-tweet').val();
        imgName=fakePath.substr(12);
        //alert(imgName);
        console.log($('file_tweet[type=file]').val())
        

        $.ajax({
            type: "POST",
            url: "tweet/save_tweet_image.php",
            data: form,
            cache       : false,
            contentType : false,
            processData : false,   
            success: function(e){
                //$('#info_messages').html(e);
            },
            error: function (xhr) {
                console.log(xhr.status);
                console.log(xhr.statusText);
            }
        });




        $.ajax({
            url : "tweet/traitement_tweet_image.php",
            type : "POST",
            data : "id_autor=" + id_autor + "&message=" + message + "&img_name=" + imgName,
            success:function(html){
                console.log(html);
                $('.div_fil_actu').append(
                    '<div class="new_tweet">' +
                        '<div class="mini_photo_profil_session"></div>' + 
                            '<div class="titre_contenu_tweet">'+
                                 
                                '<p>'+
                                '<span class="p_nom_tweet">'+'<b>'+ name +'</b> '+ '<span style="color:grey;">'+'@'+pseudo +' - '+ date + '</span></span>' +
                                    '<br>' +
                                    '<span class="contenu_tweet">'+
                                        html +   
                                    '</span>'+
                                    '<div class=\"div_img_tweet\" style="background-image: url(\'tweet/image/'+ imgName +'\');"></div>' +
                                '</p>' +
        
                                '<div class="buttons_tweet">' +
                                    '<button class="button_reaction_tweet"><i class="far fa-heart"></i></button>' +
                                    '<button class="button_reaction_tweet" id="comment"><i class="far fa-comment"></i></button>' +
                                    '<button class="button_reaction_tweet"><i class="fas fa-retweet"></i></button>' +
                                '</div>' +
        
                            '</div>' +
                        '</div>' +
                    '</div>');

                //new_message=html;
            }
        });
    }

    if((message ==="") && (image==="")){ 
      alert('Veuillez saisir un tweet');
    }
});



function charger(){

    setTimeout( function(){

        $.ajax({
            url : "tweet/charger_tweet.php",
            type : "GET",
            success : function(html){
                //discussion = $('.div_fil_actu');
                fil_actu= document.getElementsByClassName('div_fil_actu')[0];
                fil_actu.innerHTML=html;
            }
        });

        charger();

    }, 2000);

}
charger();




