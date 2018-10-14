<?php

    ini_set("display_errors", 1);
    ini_set("track_errors", 1);
    ini_set("html_errors", 1);
    error_reporting(E_ALL);

  $db = new mysqli("localhost", $db_user, $db_password, "ratemytalk");
  if ($db->connect_error) {
    die("DB error (1).");
  }

  // check if this is a valid link
  $sql = "SELECT id, title FROM talk WHERE id=(?) LIMIT 1";
  $sql = $db->prepare($sql);
  $sql->bind_param("s", $requested_id);
  $sql->execute();
  $sql->store_result();
  $sql->bind_result($id, $title);

  $sql->fetch();

  if ($sql->num_rows != 1) {
    // requested talk does not exist
    header("Location: /");
    exit();
  }

  // now we have $id and $title
  $sql->close();
  $db->close();

  include("content/header.php");
  include("content/rate.php");
  include("content/footer.php");

?>