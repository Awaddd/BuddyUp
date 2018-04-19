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

          $('#chatbox').animate({
              scrollTop: $('#chatbox').get(0).scrollHeight
          }, 1500);
        })

        .fail(function(xhr, status, errorThrown){
          alert("Apologies, cannot load messages");
          console.log("Error: " + errorThrown);
          console.log("Status: " + status);
          console.dir(xhr);
        });
      }

      $("#send-message-form").submit(function (event){
        event.preventDefault();

        var action = $("#send-message-form").attr("action");
        var type = $("#send-message-form").attr("method");
        var message = $("#new-message").val();
        var receiver = $("#message-receiver").val();
        console.log(message);
        console.log(receiver);

        var request = $.ajax({
          url: action,
          type: type,
          data: {
            newMessage : message,
            msgReceiver : receiver
          },
        });

        request.done(function(response){
          $("#send-message-form").trigger("reset");
          if (response == "fail") {
            console.log(response);
            $("#").html("Failed to send");
          } else {
            console.log(response);

            chat.getMessages();
            $('#chatbox').animate({
                scrollTop: $('#chatbox').get(0).scrollHeight
            }, 1500);
          }
        });

        request.fail(function(jqXHR, status){
          alert("Request failed: " + status);
        });

      });


      chat.interval = setInterval(chat.getMessages, 3000);
      chat.getMessages();
  });
}
