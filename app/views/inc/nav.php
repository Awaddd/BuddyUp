<!-- <nav class="nav">

    <p class="nav__logo">Buddy<span class="logo__up">UP</span></p>
    <div class="nav__links">
      <p><a href="<?php echo URLROOT; ?>">Home</a></p>
      <p><a href="">Buddies</a></p>
      <p><a href="">Events</a></p>

      <p class="nav__links__logout"><a class="nav__links__logout" href=""> Place holder </a></p>
      <p><a href="<?php echo URLROOT;?>/users/logout"><i class="fa fa-power-off" aria-hidden="true"></i></a></p>
    </div>
  </nav> -->

  <div class="nav">
    <div class="nav__logo">
      <p class="main__logo">Buddy<span class="main__logo__up">UP</span></p>
    </div>
    <div class="nav__links">
        <a href="<?php echo URLROOT;?>/home">Home</a>
        <a href="<?php echo URLROOT;?>/buddies/buddies">Buddies</a>
        <a href="<?php echo URLROOT;?>/profiles">Profile</a>
        <a href="<?php echo URLROOT;?>/events">Events</a>
        <a href="<?php echo URLROOT;?>/users/logout" class="newBtn logout">LOGOUT</a>
    </div>

    <div class="sidemenu-btn-open" id="openSideMenu">
        <svg width="30" height="30">
          <path d="M0,5 30, 5" stroke="#fff"
          stroke-width="5"/>
          <path d="M0,14 30, 14" stroke="#fff"
          stroke-width="5"/>
          <path d="M0,23 30, 23" stroke="#fff"
          stroke-width="5"/>
        </svg>
    </div>

    <div id="side-menu" class="side-menu">
      <a href="" class="sidemenu-btn-close" id="closeSideMenu">&times;</a>
      <a href="<?php echo URLROOT;?>/home">Home</a>
      <a href="<?php echo URLROOT;?>/buddies/buddies">Buddies</a>
      <a href="<?php echo URLROOT;?>/profiles">Profile</a>
      <a href="<?php echo URLROOT;?>/events">Events</a>
    </div>
  </div>
