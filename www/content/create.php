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
  


  // show DB entry


?>