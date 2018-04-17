
<?php require APPROOT . '/views/inc/header.php' ?>


    <!-- <p class="main__logo">Buddy<span class="main__logo__up">UP</span></p> -->

    <div class="home__body">
      <div class="home__nav">
        <div class="home__nav__logo">

          <p class="main__logo">Buddy<span class="main__logo__up">UP</span></p>
        </div>
        <div class="home__logout">
          <?php if (isset($_SESSION['User_ID'])): ?>
            <a href="<?php echo URLROOT;?>/users/logout" class="newBtn logout">LOGOUT</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="home__content">




        <?php if (!isset($_SESSION['User_ID'])): ?>
          <div class="home__bigtext">Hi.</div>
          <div class="home__smalltext"><p><a href="<?php echo URLROOT; ?>/users/login">Login |</a>
            <a href="<?php echo URLROOT; ?>/users/register">Sign up</a></p>
          </div>
        <?php else: ?>
          <div class="home__bigtext">Hi <?php echo $data['Name']; ?></div>

          <div class="home__links">
            <p><a href="" class="current">Home</a></p>
            <p><a href="<?php echo URLROOT;?>/buddies/buddies">Buddies</a></p>
            <p><a href="<?php echo URLROOT;?>/profiles">Profile</a></p>
            <p><a href="<?php echo URLROOT;?>/events">Events</a></p>
          </div>
          <div class="home__btn">
            <a href="<?php echo URLROOT;?>/matches/makematch" class="newBtn homeBtn">MEET PEOPLE</a>
          </div>
        <?php endif; ?>



      </div>


    </div>

<?php require APPROOT . '/views/inc/footer.php' ?>
