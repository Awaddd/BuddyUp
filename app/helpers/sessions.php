<?php

session_start();

function isLoggedIn(){
  if (isset($_SESSION['User_ID'])) {
    return true;
  } else {
    return false;
  }
}

?>
