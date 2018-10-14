<?php

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

  // let's get all the ratings
  $sql = "SELECT slides_score, speaker_score, comments FROM rating WHERE talk_id=(?)";
  $sql = $db->prepare($sql);
  $sql->bind_param("s", $requested_id);
  // print_r($sql);
  $sql->execute();

  $sql->store_result();
  $sql->bind_result($slides_score, $speaker_score, $comment);

  $number_of_ratings = $sql->num_rows;

  $slides_scores = array($number_of_ratings);
  $speaker_scores = array($number_of_ratings);
  $comments = array($number_of_ratings);

  for($i=0; $i < $number_of_ratings; ++$i){

    $sql->fetch();

    $slides_scores[$i] = $slides_score;
    $speaker_scores[$i] = $speaker_score;
    $comments[$i] = $comment;

  }
  

  // now we have $id and $title and all the ratings
  $sql->close();
  $db->close();

  include("content/header.php");
  include("content/results.php");
  // include("content/footer.php");

?>