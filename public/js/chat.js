var chat = {}

if($("#msgbody").length > 0){
    $(document).ready(function(){

      var rec = $("#message-receiver").val();
      console.log(rec);

      chat.getMessages = function(){

        $.ajax({
          url: "Messages/loadMessages",
          type: "post",
          data: {receiver : rec}
        })

        .done(function(data){
          $("#chat-content").html(data);
          $("#chat-content").animate({
            scrollTop: $('#chat-content').get(0).scrollHeight
          }, 1500);
        })

        .fail(function(xhr, status, errorThrown){
          alert("Apologies, cannot load messages");
          console.log("Error: " + errorThrown);
          console.log("Status: " + status);
          console.dir(xhr);
        });
      }

      chat.interval = setInterval(chat.getMessages, 2000);


  });
}
