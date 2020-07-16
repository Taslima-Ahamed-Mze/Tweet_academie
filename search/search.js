
$(document).ready(function(){

    $("input").keyup(function (){
        var action = 'fetch_user';
        var name=$('#search').val();
        $.ajax({

            url:"search/search_action.php",
            type:"post",
            data:{action:action,search:name},
            success:function(data)
            {
                $('.div_info_following').html(data);
            }
        });
    });
    function fetch_user()
    {
        var action = 'fetch_user';
        var name=$('#search').val();
        $.ajax({

            url:"search/search_action.php",
            type:"post",
            data:{action:action,search:name},
            success:function(data)
            {
                $('.div_info_following').html(data);
            }
        });
    }
   

    $(document).on('click','.action_button',function(){
        var id_followed = $(this).data('id_followed');
        var action = $(this).data('action');
        $.ajax({
            url:"search/search_action.php",
            type:'post',
            data:{id_followed:id_followed,action:action},
            success:function(html)
            {
                fetch_user();
            }
        });
    });
   
});
