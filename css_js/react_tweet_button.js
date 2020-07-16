function like(val, id_div){
    
    var user= $('#id_auteur').val();

    $('.buttons_tweet')[id_div].innerHTML=
    '<button class="button_reaction_tweet"  onclick="dislike('+ val +', ' + id_div+')"><i class="fas fa-heart"></i></button>' +
    '<button class="button_reaction_tweet" id="comment"  onclick="comment('+ val +', ' + id_div+')"><i class="far fa-comment"></i></button>' +
    '<button class="button_reaction_tweet" onclick="retweet('+ val +', ' + id_div+')"><i class="fas fa-retweet"></i></button>';
    
    $.ajax({
        url : "tweet/like_tweet.php",
        type : "POST",
        data : "id_user=" + user + "&id_tweet=" + val,
        success :  function(html){
            
        }
    });
}

function dislike(val, id_div){

    var user= $('#id_auteur').val();
    $('.buttons_tweet')[id_div].innerHTML=
    '<button class="button_reaction_tweet"  onclick="like('+ val +', ' + id_div+')"><i class="far fa-heart"></i></button>' +
    '<button class="button_reaction_tweet" id="comment"  onclick="comment('+ val +', ' + id_div+')"><i class="far fa-comment"></i></button>' +
    '<button class="button_reaction_tweet" onclick="retweet('+ val +', ' + id_div+')"><i class="fas fa-retweet"></i></button>';

    

    $.ajax({
        url : "tweet/like_tweet.php",
        type : "POST",
        data : "id_user=" + user + "&id_tweet=" + val,
        success :  function(html){


            
        }
    });
}


var id_tweet;
var id_retweet;
function comment(val, id_div){

    id_tweet=val;
    image=
    console.log($('.tweet_to_reply'))
    $.ajax({
        url : "tweet/tweet_to_reply.php",
        data : "id_tweet=" + val,
        type : "GET",
        success : function(html){
            //discussion = $('.div_fil_actu');
            tweet= document.getElementsByClassName('tweet_to_reply')[0];
            tweet.innerHTML=html;
        }
    });

}

$('#file_tweet_rep').on('change', function(e){

    var file_data = this.files[0];
    var image_rep = new FormData();                   
    image_rep.append('file', file_data);

    if (this.files) {
        [].forEach.call(this.files, readAndPreview);
    }
   
    function readAndPreview(file) {
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            var imagee_rep = new Image();
            imagee_rep.height = 100;
            imagee_rep.src = this.result;


            $('.form_input_tweet_reply').css("height", "170px");
            $('.preview_picture_rep').css("height", "100px");
            $('.preview_picture_rep').css("margin-top", "10px");
            $('.preview_picture_rep').css("margin-bottom", "10px");
            $('.preview_picture_rep').css("width", "max-content");
            $('.preview_picture_rep').css("float", "right");
            $('.input_tweet').css("width", "60%");

            $('.preview_picture_rep').append(imagee_rep)
        });
        
        reader.readAsDataURL(file);
       
   
        
    }
});



$('.button_repondre').click(function(e){

    alert('Commentaire enregistré');

    id_tweet;

    var message= $('#content_tweet_rep').val();
    var id_autor= $('#id_auteur').val();
    image_rep=$('#file_tweet_rep').val();

    if((message !=="") && (image_rep=="")){

        $.ajax({
            url : "tweet/traitement_tweet.php",
            type : "POST",
            data : "id_autor=" + id_autor + "&message=" + message + "&id_tweet_rep=" + id_tweet,
        });
    }


    if((message !=="") && (image_rep!=="")){ 
        alert('img + message')
        //var file_data = this.file;
        input = document.getElementById('file_tweet_rep')
        form_rep = new FormData(($('.form_input_tweet_reply')[0]))
        alert(form_rep)
        
        fakePath = $('.input-file-tweet').val();
        imgName=image_rep.substr(12);
        alert(imgName);
        console.log($('file_tweet[type=file]').val())
        
        $.ajax({
            type: "POST",
            url: "tweet/save_tweet_image.php",
            data: form_rep,
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
        });
    }





    if(message ==""){
        alert('Veuillez saisir votre repondre');
    }
});





function retweet(val, id_div){

    id_tweet=val;
    id_retweet=val;
    $.ajax({
        url : "tweet/tweet_to_reply.php",
        data : "id_tweet=" + id_tweet,
        type : "GET",
        success : function(html){
            //discussion = $('.div_fil_actu');
            tweet= document.getElementsByClassName('tweet_to_retweet')[0];
            tweet.innerHTML=html;
            
        }
    });

}


$('.button_retweet').click(function(e){
    alert('Retweet réalisé avec succés');
    message="";
    id_retweet;

    $.ajax({
        url : "tweet/traitement_tweet.php",
        type : "POST",
        data : "message=" + message + "&id_retweet=" + id_retweet,
        success:function(html){
       
            $('.div_fil_actu').append()
        }
    });

});

var count=0;
$('.div_emoji').click(function(e){
  
    if(count==0){
        $('.contener_emoji').css('display', 'flex');
        $('.contener_emoji').css('flex-wrap', 'wrap');
        count=1;
        return;
    }
    if(count==1){
        $('.contener_emoji').css('display', 'none');
        
        count=0;
        return;
    }


})

function enableTxt(elem) {
    addEmoji = $('.input_tweet').val() 
    $('.input_tweet').val(addEmoji + $(elem).html()); 

}
