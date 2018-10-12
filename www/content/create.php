<?php

  require "library/HTMLPurifier.path.php";
  require "HTMLPurifier.includes.php";
  require "includes/util.php";

  $email = $_REQUEST["email"];
  $title = $_REQUEST["title"];

  // sanity check
  // $config = HTMLPurifier_Config::createDefault();
  $purifier = new HTMLPurifier();
  $email = $purifier->purify($email);
  $title = $purifier->purify($title);

  if (empty(trim($email)) || empty(trim($title))) {
    header("Location: /");
    exit();
  }

  // create new DB entry

  $db = new mysqli("localhost", $db_user, $db_pass, "ratemytalk");
  if ($db->connect_error) {
    die("DB error (1).");
  }

  $new_id = getToken(6);

  $golden = FALSE;

  while($golden === FALSE) {

    // check if the ID is already taken
    $sql = "SELECT id FROM talk WHERE id='$new_id' LIMIT 1";
    $sql = $db->query($sql);
    if ($sql->num_rows != 0) {
      $new_id = getToken(6);
      continue; // to select a new ID
    }

    // ID should be free
    $sql = "INSERT INTO talk (id, email, title) VALUES (?,?,?)";
    $sql = $db->prepare($sql);
    $sql->bind_param("sss", $new_id, $email, $title);
    $status = $sql->execute();

    if ($status === TRUE) {

      // we are golden
      $golden = TRUE;

    } else {
      die("DB error (2).");
    }

  }

  $sql->close();
  $db->close();

  // we are golden!!
  include("includes/header.php");
  include("content/allset.php");
  include("includes/footer.php");

?>