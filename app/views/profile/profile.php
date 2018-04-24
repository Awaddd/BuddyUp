<?php
require APPROOT . '/views/inc/header.php';
?>

<div class="profile__body background-purple-gradient">
  <?php  require APPROOT . '/views/inc/nav.php'; ?>
  <div class="title">
    Profile
  </div>
  <div class="profile__wrapper">

    <div class="profile__header">
      <div class="profile__header__tabs__wrapper">
        <div class="profile__header__tabs">
          <div id="profile-tab-1" class="profile__header__tabs-1 current_tab">
            Personal Details
          </div>
          <div id="profile-tab-2" class="profile__header__tabs-2">
            Bio
          </div>
          <div id="profile-tab-3" class="profile__header__tabs-3">
            Account
          </div>
        </div>
      </div>
      <div class="profile__header__button">
        <button class="btno_col" type="button" name="button" id="manage-rec-btn">My Feedback</button>
        <button class="btno_grey" type="button" name="button" id="manage-sent-btn">Given Feedback</button>
      </div>
    </div>

    <div class="profile__main">
      <div class="profile__window">
        <div id="profile__window__title" class="profile__window__header">
          <p>Personal Details</p>
        </div>

        <div class="profile__window__content">
          <div id="profile__window-1">
            <div class="input-group">
              <span class="">First name</span>
              <input class="" type="text" name="" disabled value="<?= $data['firstname'] ?>">
            </div>
            <div class="input-group">
              <span class="">Last name</span>
              <input class="" type="text" name="" disabled value="<?= $data['lastname'] ?>">
            </div>
            <div class="input-group">
              <span class="">DOB</span>
              <input class="" type="text" name="" disabled value="<?= $data['dob'] ?>">
            </div>
            <div class="input-group">
              <span class="">Gender</span>
              <input class="" type="text" name="" disabled value="<?php if ($data['gender'] == 'm' || $data['gender'] == 'M') {
                echo 'Male';
              } else {
                echo "Female";
              } ?>">
            </div>
            <div class="profile__window__button">
              <button id="manage-personal-btn" class="btn-same c2" type="button" name="button">Make changes</button>
            </div>
          </div>
          <div id="profile__window-2">
            <div class="input-group">
              <span class="">Bio  </span>
              <textarea name="name" rows="8" cols="80" disabled><?= $data['bio'] ?></textarea>
            </div>
            <div class="profile__window__button">
              Refer back to the first tab to make changes
            </div>
          </div>
          <div id="profile__window-3">
            <div class="input-group">
              <span class="">Username</span>
              <input class="" type="text" name="" disabled value="<?= $data['username'] ?>">
            </div>
            <div class="input-group">
              <span class="">Email</span>
              <input class="" type="text" name="" disabled value="<?= $data['email'] ?>">
            </div>
            <div class="input-group">
              <span class="">Password</span>
              <input class="" type="password" name="" disabled value="password">
            </div>
            <div class="input-group">
              <span class="">Registered on</span>
              <input class="" type="text" name="" disabled value="<?= $data['reg'] ?>">
            </div>
            <div class="profile__window__button">
              <button id="manage-account-btn" class="btn-same c2" type="button" name="button">Make changes</button>
            </div>
          </div>
        </div>

      </div>
      <div class="profile__side">
        <div class="profile__side__header">
          Interests
        </div>
        <div class="profile__side__content" id="interest-list-off">
          <!-- <span>Basketball</span>
          <span>Skiing</span>
          <span>Golf</span>
          <span>Reading</span>
          <span>Snowboarding</span>
          <span>Jetskiing</span>
          <span>Jogging</span> -->

          <?php foreach ($data['interests'] as $interest): ?>
            <span><?= $interest->Description ?></span>
          <?php endforeach; ?>

        </div>

        <!-- <form class="profile__side__button" action="Profiles" method="post">
          <input class="c-def-input" type="text" name="interest">
            <input type="submit" class="btn-same c2" type="button" name="addInterest" value="Add Interests">
        </form> -->
        <div class="profile__side__button">
            <button id="manage-interest-btn" type="submit" class="btn-same c2" type="button" name="addInterest" >Add Interests</button>
        </div>
      </div>
    </div>

  </div>


  <div id="manage-personal" class="modal">
    <div class="modal__content manage-personal">
      <div class="modal__header">
        <span>Personal</span>
        <span id="manage-personal-exit" class="modal__exit">&times;</span>
      </div>
      <div class="modal__body">
        <p>Enter your new details</p>
        <div class="input-group">
          <span class="">First name</span>
          <input class="" type="text" name="" value="<?= $data['firstname'] ?>">
        </div>
        <div class="input-group">
          <span class="">Last name</span>
          <input class="" type="text" name="" value="<?= $data['lastname'] ?>">
        </div>
        <div class="input-group">
          <span class="">DOB</span>
          <input class="" type="text" name=""value="<?= $data['dob'] ?>">
        </div>
        <div class="input-group">
          <span class="">Gender</span>
          <input class="" type="text" name="" value="<?php if ($data['gender'] == 'm' || $data['gender'] == 'M') {
            echo 'Male';
          } else {
            echo "Female";
          } ?>">
        </div>

        <div class="input-group">
          <span class="">Bio  </span>
          <textarea name="name" rows="3" cols="80"><?= $data['bio'] ?></textarea>
        </div>

        <div class="profile__window__button">
          <button type="button" class="btn-same c2" type="button" name="" >Save Changes</button>
        </div>

      </div>
    </div>
  </div>

  <div id="manage-account" class="modal">
    <div class="modal__content manage-account">
      <div class="modal__header">
        <span>Account</span>
        <span id="manage-account-exit" class="modal__exit">&times;</span>
      </div>
      <div class="modal__body">
        <div class="input-group">
          <span class="">Username</span>
          <input class="" type="text" name="" value="<?= $data['username'] ?>">
        </div>
        <div class="input-group">
          <span class="">Email</span>
          <input class="" type="text" name="" value="<?= $data['email'] ?>">
        </div>
        <div class="input-group">
          <span class="">Password</span>
          <input class="" type="password" name="" value="password">
        </div>
        <div class="input-group">
          <span class="">Registered on</span>
          <input class="" type="text" name="" value="<?= $data['reg'] ?>">
        </div>
        <div class="profile__window__button">
          <button class="btn-same c2" type="button" name="button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div id="manage-rec-feedback" class="modal">
    <div class="modal__content manage-feedback">
      <div class="modal__header">
        <span>Received Feedback</span>
        <span id="manage-rec-exit" class="modal__exit">&times;</span>
      </div>
      <div class="modal__body">
        <div class="display__feedback">

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                From Kashif
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                From Kashif
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                From Kashif
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                From Kashif
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                From Kashif
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div id="manage-sent-feedback" class="modal">
    <div class="modal__content manage-feedback">
      <div class="modal__header">
        <span>Sent Feedback</span>
        <span id="manage-sent-exit" class="modal__exit">&times;</span>
      </div>
      <div class="modal__body">

        <div class="display__feedback">

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                To Julie
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                To James
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                To Dawa
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                To Awad
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

          <div class="feedback__panel">
            <div class="feedback__top">
              <div class="feedback__top__description">
                Great Tour. Enjoyed sightseeing with you and I look forward to the next.
              </div>
            </div>
            <div class="feedback__bottom">
              <div class="">
                Rating: 5/5
              </div>
              <div class="">
                To Kashif
              </div>
              <div class="">
                31st June
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

  <div id="manage-interest" class="modal">
    <div class="alert success">
      <?php if (isset($data['success'])): ?>
        <?php echo $data['success'] ?>
      <?php elseif ($data['available']): echo $data['available']; ?>
      <?php elseif ($data['unavailable']): echo $data['unavailable']; ?>
      <?php elseif ($data['failed']): echo $data['failed']; ?>
      <?php endif; ?>
    </div>

    <div class="modal__content manage-interests">
      <div class="modal__header">
        <span>Interests</span>
        <span id="manage-interest-exit" class="modal__exit">&times;</span>
      </div>
      <div class="modal__body manage-interests-body">
        <div class="manage-interests-header">
          <div class="">
            Everybody's Interests
          </div>
          <div class="">
            Your interests
          </div>
        </div>
        <form class="manage-interests-content" id="add-interest-form" action="Profiles" method="POST">
          <div class="manage-interests-all">

            <span>Basketball</span>
            <span>Nature</span>
            <span>Environment</span>
            <span>Volcanoes</span>
            <span>Conspiracy Theories</span>
            <span>Economics</span>
            <span>Skiing</span>
            <span>Reading</span>
            <span>Waving</span>
            <span>Games</span>
            <span>Sports</span>
            <span>Ajax</span>
            <span>Tennis</span>
            <span>Chocolate</span>
            <span>Water</span>

          </div>
          <div class="manage-interests-myinterests">
            <div class="myinterest-list" id="interest-list">
                <?php foreach ($data['interests'] as $interest): ?>
                  <span><?= $interest->Description ?></span>
                <?php endforeach; ?>
            </div>
            <div class="manage-interests-myinterests-inputs">
              <input class="c-def-input" type="text" id="new-interest">
              <input type="submit" class="btn-same c2" name="addInterest" id="add-interest" value="Add Interests">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
