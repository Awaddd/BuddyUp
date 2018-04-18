var chat = {}

if($("#msgbody").length > 0){
    $(document).ready(function(){


      alert("OK");

      getMessages();


  });
}

chat.getMessages(){
  alert("getMessages");
  $.ajax({
    url: "Messages",
    type: "GET",
    dataType : "json",
  })

  .done(function(data){
    $("#chat-content").html(data);
  })

  .fail(function(xhr, status, errorThrown){
    alert("Apologies, cannot load messages");
    console.log("Error: " + errorThrown);
    console.log("Status: " + status);
    console.dir(xhr);
  });

}

chat.interval = setInterval(chat.getMessages, 2000);
