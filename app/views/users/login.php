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

  <?php if (!empty($data['uname_err']) || !empty($data['password_err'])): ?>
    <div class="validation__errors">
      <?php if(!empty( $data['uname_err'] )): ?>
        <div class=""><?= $data['uname_err'] ?></div>
      <?php endif; ?>
      <?php if(!empty( $data['password_err'] )): ?>
        <div class=""><?= $data['password_err'] ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

</div>



<?php require APPROOT . '/views/inc/footer.php' ?>
