// $("#add-interest").on("click", function(event){
// $("add-interest-form").on("submit", function(event)){
$("#add-interest-form").submit(function (event){

  event.preventDefault();

  var action = $("#add-interest-form").attr("action");
  var type = $("#add-interest-form").attr("method");
  var newInterest = $("#new-interest").val();
  console.log(newInterest);
  var request = $.ajax({
    url: action,
    type: type,
    data: {interestToAdd : newInterest},
  });


  request.done(function(msg) {
    if (msg == "fail") {
      console.log(msg);

      $("#interest-list").html("Failed");
    } else {
      console.log(msg);

      $("#interest-list").append('<span>' + msg + '</span>');
      $('#interest-list').animate({
          scrollTop: $('#interest-list').get(0).scrollHeight
      }, 1500);
    }
  });

  request.fail(function(jqXHR, status){
    alert("Request failed: " + status);
  });
});



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
      $("#test").fadeIn().html(response);
    }
  });

  request.fail(function(jqXHR, status){
    alert("Request failed: " + status);
  });

});

//Load messages

//Short hand for document ready
// $(function (){
//
//   var messages = $('#chat-content');
//
//   var loadMessages = $.get("Messages");
//
//   loadMessages.done(function(response){
//     var msgs = response;
//     console.log(msgs);
//
//     alert("got eeeem");
//
//     console.log(msgs);
//     console.log(msgs.message);
//     console.log(msgs[1].message);
//     console.log(msgs[1].sender_id);
//     console.log(msgs[1].date);
//     console.log(msgs[1].sender);
//   });
//
//   loadMessages.fail(function(jqXHR, status){
//     alert("Request failed: " + status);
//   });
//
// });

// $.ajax({
//
// })
//
// $(function(){
//   $.ajax({
//     type: 'GET',
//     url: 'Messages',
//     success: function(msg){
//       alert("got the messages")
//       console.log( msg[0].message );
//     }
//   });
// });
