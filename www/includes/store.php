<?php

  require "library/HTMLPurifier.path.php";
  require "HTMLPurifier.includes.php";
  require "includes/util.php";

  // check if we have a cookie already
  if (isset($_COOKIE[$requested_id])) {
    header("Location: /".$requested_id."/results");
    die();
  }


  $slides_score = $_REQUEST["slides_score"];
  $speaker_score = $_REQUEST["speaker_score"];
  $comments = $_REQUEST["comments"];
  $comments = str_replace(array("\r", "\n"), ' ', $comments);

  // sanity check
  // $config = HTMLPurifier_Config::createDefault();
  $purifier = new HTMLPurifier();
  $slides_score = $purifier->purify($slides_score);
  $speaker_score = $purifier->purify($speaker_score);
  $comments = $purifier->purify($comments);

  if ($slides_score != "10" && $slides_score != "0" && $slides_score != "-10") {
    header("Location: /");
    die();
  }

  if ($speaker_score != "10" && $speaker_score != "0" && $speaker_score != "-10") {
    header("Location: /");
    die();
  }


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

  // now we insert the rating!

  $sql = "INSERT INTO rating (talk_id, speaker_score, slides_score, comments) VALUES (?,?,?,?)";
  $sql = $db->prepare($sql);
  $sql->bind_param("ssss", $id, $speaker_score, $slides_score, $comments);
  $status = $sql->execute();

  if ($status === TRUE) {

    // we are golden
    $golden = TRUE;

  } else {
    die("DB error (3).");
  }

  $sql->close();
  $db->close();

  # set a cookie
  setcookie($requested_id, "rated", time()+60*60*24*7);

  // now let's thank the user

  include("content/header.php");
  include("content/store.php");
  include("content/footer.php");


?>