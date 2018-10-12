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
  $new_id = getToken(6);

  $new_id = "E4SZSM";

  $db = new mysqli("localhost", "", "", "ratemytalk");
  if ($db->connect_error) {
    die("DB error (1).");
  }

  $sql = "INSERT INTO talk (id, email, title) VALUES (?,?,?)";
  $sql = $db->prepare($sql);
  $sql->bind_param("sss", $new_id, $email, $title);
  $status = $sql->execute();

  if ($status) {
    echo "OK";
  } else {
    die("DB error (2).");
  }

  echo $new_id;

  $sql->close();
  $db->close();

  // show DB entry


?>
