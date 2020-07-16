$(document).ready(function(){

    
    function fetch()
    {
        var action = "unfollow_membre"; 
        
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
    fetch();
   

    $(document).on('click','.action_button',function(){
        var id_followed = $(this).data('id_followed');
        var action = $(this).data('action');
        $.ajax({
            url:"follow/follow-class.php",
            type:'post',
            data:{id_followed:id_followed,action:action},
            success:function(html)
            {
                fetch();
            }
        });
    });
    
});