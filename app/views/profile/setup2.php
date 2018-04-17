<?php require APPROOT . '/views/inc/header.php'
  echo json_encode($data['interests']);

?>

  <h2>Interests <button id="loadInterests">View interests</button></h2>
  <div id="interests"></div>



<?php require APPROOT . '/views/inc/footer.php' ?>
