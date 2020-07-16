$(document).ready(function(){

    function fetch_followers()
    {
        var action = "followers"; 
        
        $.ajax({

            url:'follow/follow-class.php',
            type:'post',
            data:{action:action},
            success:function(data)
            {
                $('.div_info_following').html(data);
            }
        });
    }
    fetch_followers();
});   