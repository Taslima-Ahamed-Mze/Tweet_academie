  $('#form_name').keyup(function(){
    var len = this.value.length;
    $('#charNumName').text(len + "/50");
  });

  $('#form_surname').keyup(function(){
    var len = this.value.length;
    $('#charNumSurname').text(len + "/50");
  });

  $('#form_bio').keyup(function(){
    var len = this.value.length;
    $('#charNumBio').text(len + "/160");
  });
  
  $('.input_tweet').keyup(function(){
    var len = this.value.length;
    $('#charNumTweetRep').text(len + "/140");
  });

  