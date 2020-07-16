$(document).ready(function(){

    function hashtag()
    {
        var action = "hashtag"; 
        
        $.ajax({

            url:'hashtag/hashtag_action.php',
            type:'post',
            data:{action:action},
            success:function(data)
            {
                $('.div_info_following').html(data);
            }
        });
    }
    hashtag();
});   
