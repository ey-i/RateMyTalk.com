<?php

  $db = new mysqli("localhost", $db_user, $db_password, "ratemytalk");
  if ($db->connect_error) {
    die("DB error (1).");
  }



?>