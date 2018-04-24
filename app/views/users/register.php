<?php require APPROOT . '/views/inc/header.php' ?>


      <!-- html -->

  <div class="register__body">
    <div class="home__nav">
      <div class="home__nav__logo">

        <p class="main__logo">Buddy<span class="main__logo__up">UP</span></p>
      </div>
      <div class="home__logout">
      </div>
    </div>
    <div class="register__content" id="reg-content">

      <p class="content__title">Sign up</p>

        <form action="<?php echo URLROOT;?>/users/register" method="post">

          <div id="loginDetails" class="wrapper">
            <p class="wrapper__title"> Login Details</p>
            <div class="wrapper__inputs">
              <input class="c-def-input" type="text" placeholder="Username" name="Username" >
              <input class="c-def-input"  type="password" placeholder="Password" name="Password" >
              <input class="c-def-input"  type="password" placeholder="Confirm Password" name="C_Password">
            </div>

            <div class="wrapper__radio">
              <label class="radio__label" for="tourist">
                <p>Tourist</p>
                <input id="tourist" type="radio" name="Role" value="1" checked>
              </label>
              <label class="radio__label" for="buddy">
                <p>Buddy</p>
                <input id="buddy" type="radio" name="Role" value="2">
              </label>
            </div>
          </div>

          <div id="personalDetails" class="wrapper">
            <p class="wrapper__title"> Personal Details </p>
            <div class="wrapper__inputs">
              <input class="c-def-input" type="text" placeholder="First Name" name="FirstName" >
              <input class="c-def-input"  type="text" placeholder="Last Name" name="LastName" >
              <input class="c-def-input"  type="text" placeholder="Email" name="Email" >
              <input class="c-def-input"  type="date" name="DateOfBirth" >
            </div>
            <div class="wrapper__radio">
              <label class="radio__label" for="male">
                <p>Male</p>
                <input id="male" type="radio" name="Gender" value="M" checked>
              </label>
              <label class="radio__label" for="female">
                <p>Female</p>
                <input id="female" type="radio" name="Gender" value="F">
              </label>
            </div>
          </div>

          <!-- <p class="register__footer">Already got an account?<a href="index.php">Sign in</a></p> -->
            <div class="mainBtn">
              <button class="btn-same control" type="button" id="nextBtn"> Next </button>
              <button class="btn-same control" type="button" id="backBtn"> Back </button>
              <button class="btn-same success" type="submit" id="submitBtn"> Submit </button>

            </div>

        </div>
      </form>

        <div style="color: #fff; padding-left: 15px;" class="temp"><span style="color: red;">TEMP Location for errors:<br></span>
          <span>
          <?php echo $data['uname_err'] . "<br>";
            echo $data['password_err'] . "<br>";
            echo $data['cpassword_err'] . "<br>";
            echo $data['role_err'] . "<br>";
            echo $data['fname_err']. "<br>";
            echo $data['lname_err']. "<br>";
            echo $data['email_err']. "<br>";
            echo $data['dob_err']  . "<br>";
            echo $data['gender_err'] ?> </span>
        </div>

  </div>

<?php require APPROOT . '/views/inc/footer.php' ?>
