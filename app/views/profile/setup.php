<form class="" action="<?php echo URLROOT; ?>/interests" method="post">

<?php
foreach($data['interests'] as $interest): ?>

        <label for="<?= $interest->Description ?>">
        <p>
        <input type="checkbox" name="check_list[]" value="<?= $interest->Description; ?>">
        <?= $interest->Description ?>
        </p>
        </label>
        <?php

        endforeach; ?>

        <br>
  <input type="text" name="Description" placeholder="Enter your interests">
  <input type="submit" value="Add">
</form>
