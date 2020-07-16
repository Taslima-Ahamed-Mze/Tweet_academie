//MESSAGERIE
//$('.button_envoiee').click(function(e){
    e.preventDefault();

    var id = $('#id_recois').val();
    var message = $('#message').val();
   
    var day = new Date().toLocaleDateString("fr-FR");
    var d = new Date();
    var time = d.toLocaleTimeString();

    var date = day + " " + time;

    if(message != ""){ 
        
        $.ajax({
            url : "tchat/traitement.php",
            type : "POST", 
            data : "id_recois=" + id_recois + "&message=" + message
        });

       //$('.content_discussion').append("<div style='display:flex; justify-content:space-between; width:100%;'> <div></div>  <div style='flex-direction:column;'> <p class='bulle_envoie'>" + message + "</p> <p style='font-size:8px; position:relative; bottom:8px;'>"+"</p></div></div>");
    }
//});


// function charger(){

//     setTimeout( function(){
        
//         var id_recois = $('#id_recois').val();
        
//         $.ajax({
//             url : "tchat/charger.php?id="+id_recois,
//             type : "GET",
//             success : function(html){
//                 //discussion = $('.content_discussion');
//                 discussion= document.getElementsByClassName('content_discussion')[0];
//                 discussion.innerHTML=html;
//             }
//         });

//         charger();

//     }, 5000);

// }

// charger();