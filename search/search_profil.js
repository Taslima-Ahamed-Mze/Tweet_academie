function getDataProfil(){

    id_user=$('.id_user').val();

    $.ajax({
        url : "search/get_search_profil_info.php",
        data : "id_user=" + id_user,
        type : "GET",
        success : function(html){

            div= document.getElementsByClassName('data_profil')[0];
            div.innerHTML=html;
        }
    });

}
getDataProfil();