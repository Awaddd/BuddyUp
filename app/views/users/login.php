<?php require APPROOT . '/views/inc/header.php' ?>



<div class="login__body">
  <div class="home__nav">
    <div class="home__nav__logo">

      <p class="main__logo">Buddy<span class="main__logo__up">UP</span></p>
    </div>
    <div class="home__logout">
    </div>
  </div>
  <div class="login__content">

    <form class="login__form" action="<?php echo URLROOT; ?>/users/login" method="post">
      <p class="login__header">Sign in</p>
      <div class="login__inputs">
      <input type="text" class="c-def-input" name="Username" placeholder="Username" >
      <input type="password" class="c-def-input" name="Password" placeholder="Password" >

      <input type="submit" class="btn success" name="submit" value="Sign in">
      </div>
      <p class="login__signup">No account? <a href="<?php echo URLROOT;?>/users/register"> Create one!</a></p>
    </form>

  </div>

  <div style="color: #fff; padding-left: 15px;" class="temp"><span style="color: red;">TEMP Location for errors:<br></span>
    <span><?php
      echo $data['uname_err'] . "<br>";
      echo $data['password_err'] . "<br>";?></span>
  </div>

</div>



<?php require APPROOT . '/views/inc/footer.php' ?>
