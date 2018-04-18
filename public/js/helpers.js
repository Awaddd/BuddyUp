// PROFILE TABS

var profile1 = $("#profile__window-1");
var profile2 = $("#profile__window-2");
var profile3 = $("#profile__window-3");
var profileTab1 = $("#profile-tab-1");
var profileTab2 = $("#profile-tab-2");
var profileTab3 = $("#profile-tab-3");
// CHANGE TITLE!!!
var profileTabTitle = $("#profile__window__title");

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
      alert("we here");

      $("#buddybody").hide();

      function spinner(){
        $("#buddybody").show();
        $("#spinner").hide();
      }

      setTimeout(spinner, 3000);

    }
  }
