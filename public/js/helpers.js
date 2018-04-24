// PROFILE TABS

var profile1 = $("#profile__window-1");
var profile2 = $("#profile__window-2");
var profile3 = $("#profile__window-3");
var profileTab1 = $("#profile-tab-1");
var profileTab2 = $("#profile-tab-2");
var profileTab3 = $("#profile-tab-3");
// CHANGE TITLE!!!
var profileTabTitle = $("#profile__window__title");

// SIGN UP BUTTONS
var nextBtn = $("#nextBtn");
var backBtn = $("#backBtn");
var submitBtn = $("#submitBtn");
// Sign up tabs
var loginDetails = $("#loginDetails");
var personalDetails = $("#personalDetails");
var registerContent = $("#reg-content");

$( document ).ready(function() {
    //Manually set display: none on top of profile css
    profileTab1.on("click", function(){
      // $(".profile__header__tabs").remove("current_tab");
      $(".profile__header__tabs div").removeClass("current_tab");
      profileTab1.addClass("current_tab");
      profileTabTitle.html( "<p>Personal Details</p>" );
      profile1.show("medium");
      profile2.hide("medium");
      profile3.hide("medium");
    });
    profileTab2.on("click", function(){
      $(".profile__header__tabs div").removeClass("current_tab");
      profileTab2.addClass("current_tab");
      profileTabTitle.html( "<p>Bio</p>" );
      profile1.hide("medium");
      profile2.show("medium");
      profile3.hide("medium");
    });
    profileTab3.on("click", function(){
      $(".profile__header__tabs div").removeClass("current_tab");
      profileTab3.addClass("current_tab");
      profileTabTitle.html( "<p>Account</p>" );
      profile1.hide("medium");
      profile2.hide("medium");
      profile3.show("medium");
    });

    //Sign up buttons
    nextBtn.on("click", function(){
      nextBtn.hide();
      loginDetails.hide();

      backBtn.show();
      submitBtn.show();
      personalDetails.show();

      registerContent.css({"height" : "480px"});
    });

    backBtn.on("click", function(){
      nextBtn.show();
      loginDetails.show();

      backBtn.hide();
      submitBtn.hide();
      personalDetails.hide();

      registerContent.css({"height" : "420px"});

    });
});



// POP UPS

//manage-interest
var manage_bio = $("#manage-account");

var manage_interest = $("#manage-interest");
var manage_interest_btn = $("#manage-interest-btn");
var manage_interest_exit = $("#manage-interest-exit");

manage_interest_btn.on('click', function(){
  manage_interest.show();
});
manage_interest_exit.on('click', function(){
  manage_interest.hide();
});

var manage_personal = $("#manage-personal");
var manage_personal_btn = $("#manage-personal-btn");
var manage_personal_exit = $("#manage-personal-exit");

manage_personal_btn.on('click', function(){
  manage_personal.show();
});
manage_personal_exit.on('click', function(){
  manage_personal.hide();
});

var manage_account = $("#manage-account");
var manage_account_btn = $("#manage-account-btn");
var manage_account_exit = $("#manage-account-exit");

manage_account_btn.on('click', function(){
  manage_account.show();
});
manage_account_exit.on('click', function(){
  manage_account.hide();
});


// Manage sent feedback
var manage_sent = $("#manage-sent-feedback");
var manage_sent_btn = $("#manage-sent-btn");
var manage_sent_exit = $("#manage-sent-exit");

manage_sent_btn.on('click', function(){
  manage_sent.show();
});
manage_sent_exit.on('click', function(){
  manage_sent.hide();
});

// Manag rec feedback
var manage_rec = $("#manage-rec-feedback");
var manage_rec_btn = $("#manage-rec-btn");
var manage_rec_exit = $("#manage-rec-exit");

manage_rec_btn.on('click', function(){
  manage_rec.show();
});
manage_rec_exit.on('click', function(){
  manage_rec.hide();
});







// Highlight current page link

//Nav links
$(document).ready(function() {
    $(".nav__links [href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("current");
        }
    });
});

if($("#buddybody").length > 0){
    $(document).ready(function(){

      $("#spinner").show();
      $("#spinner-text").show();
      $("#buddytitle").hide();
      $(".nav").hide();
      $("#buddycontent").hide();

      function spinner(){
        $("#buddytitle").show();
        $("#buddycontent").show();
        $(".nav").show();
        $("#spinner").hide();
        $("#spinner-text").hide();
      }

      setTimeout(spinner, 1500);


    });
  }
