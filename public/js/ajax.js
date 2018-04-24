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

      // Off pop up list
      $("#interest-list-off").append('<span>' + msg + '</span>');
      $('#interest-list-off').animate({
          scrollTop: $('#interest-list').get(0).scrollHeight
      }, 1500);

    }
  });

  request.fail(function(jqXHR, status){
    alert("Request failed: " + status);
  });
});
