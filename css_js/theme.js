
count=0;
$('#button_palette').click(function(e){
    if(count==0){
        $('.palette').css('display', 'block');
        count=1;
        return;
    }
    if(count==1){
        $('.palette').css('display', 'none');
        
        count=0;
        return;
    }

});

$('.theme_1').click(function(e){
    theme = 0;

    $('body').css('background-color', 'white');
    $('.button_profil').css('color', 'white');
    $('.button_profil').css('background-color', 'rgb(85, 158, 255)');

    $('.button_tweeter').css('color', 'white');
    $('.button_tweeter').css('background-color', 'rgb(85, 158, 255)');

    $('.border_section').css('background', 'linear-gradient(217deg, rgb(165, 244, 255), rgb(85, 158, 255) 70.71%)');

    $('button').css('background-color', 'white');


    $('a:link').css('color', 'rgb(85, 158, 255)');


    $('.button_menu').css('background-color', 'white');
    $('.button_menu').hover(function(){
        $(this).css('background-color', 'rgb(249, 85, 255)');
        }, function(){
        $(this).css('background-color', 'white');

    });
    
    

    $.ajax({
        url: 'profil/theme_css.php',
        type: 'POST',
        data: "theme=" + theme,
        success:function(html){
            console.log(html);
        }
    });

    //window.location.reload()

});

$('.theme_2').click(function(e){
    theme = 1;

    //ACCUEIL

    $('body').css('background-color', 'white');
    $('.button_profil').css('color', 'white');
    $('.button_profil').css('background-color', 'rgb(249, 85, 255)');

    $('.button_tweeter').css('color', 'white');
    $('.button_tweeter').css('background-color', 'rgb(249, 85, 255)');

    $('.border_section').css('background', 'linear-gradient(217deg, rgb(23, 204, 228), rgb(249, 85, 255) 70.71%)');

    $('button').css('background-color', 'white');


    $('a:link').css('color', 'rgb(249, 85, 255)');


    $('.button_menu').css('background-color', 'white');
    $('.button_menu').hover(function(){
        $(this).css('background-color', 'rgb(249, 85, 255)');
        }, function(){
        $(this).css('background-color', 'white');

    });



    $.ajax({
        url: 'profil/theme_css.php',
        type: 'POST',
        data: "theme=" + theme,
        success:function(html){
            console.log(html);
        }
    });

});
$('.theme_3').click(function(e){
    theme = 2;

    $('body').css('background-color', 'white');
    $('.button_profil').css('color', 'white');
    $('.button_profil').css('background-color', 'rgb(255, 167, 51)');

    $('.button_tweeter').css('color', 'white');
    $('.button_tweeter').css('background-color', 'rgb(255, 167, 51)');

    $('.border_section').css('background', 'linear-gradient(217deg, rgb(255, 167, 51), yellow 70.71%)');

    $('button').css('background-color', 'white');
    $('.button_reaction_tweet').css('transition-duration', '0.8s');
    $('.button_reaction_tweet').css('color', 'rgb(255, 167, 51)');
    $('.button_reaction_tweet').css('background', 'white');

    $('.button_reaction_tweet').hover(function(){
        $(this).css('background-color', 'rgb(255, 167, 51)');
    });


    $('a:link').css('color', 'rgb(255, 167, 51)');


    $('.button_menu').css('background-color', 'white');
    $('.button_menu').hover(function(){
        $(this).css('background-color', 'rgb(255, 167, 51)');
        }, function(){
        $(this).css('background-color', 'white');
    });


    //MESSAGERIE
    $('.bulle_envoie').css('background-color', 'pink');
    $('.div_membre_contact').css('background-color',  'rgba(255, 167, 51, 0.315)');

    $.ajax({
        url: 'profil/theme_css.php',
        type: 'POST',
        data: "theme=" + theme,
        success:function(html){
            console.log(html);
        }
    });

});
$('.theme_4').click(function(e){
    theme = 3;

    $('body').css('background-color', 'black');
    $('.form_input_tweet').css('background-color', 'white');
    $('.h2_bio').css('color', 'white)');

    $('.button_profil').css('color', 'white');
    $('.button_profil').css('background-color', 'rgb(85, 158, 255)');

    $('.button_tweeter').css('color', 'white');
    //$('.button_tweeter').css('background-color', 'rgb(255, 167, 51)');

    $('button').css('background-color', 'white');


    $('.button_reaction_tweet').hover(function(){
        $(this).css('background-color', 'rgb(255, 167, 51)');
    });


    $('a:link').css('color', 'white');


    $('.button_menu').css('background-color', 'white');
    $('.button_menu').hover(function(){
        $(this).css('background-color', 'rgb(85, 158, 255)');
        }, function(){
        $(this).css('background-color', 'white');
    });


    //MESSAGERIE
    $('.div_membre_contact').css('background-color',  'rgba(250, 250, 250, 0.315)');

    

    $.ajax({
        url: 'profil/theme_css.php',
        type: 'POST',
        data: "theme=" + theme,
        success:function(html){
            console.log(html);
        }
    });

});
