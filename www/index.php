<?php

  $what = "welcome";

  print_r();

  if (isset($_REQUEST["what"])) {
    $what = $_REQUEST["what"];
  } else {
    // this could be a requested rating page
    $get_keys = array_keys($_GET);
    if (sizeof($get_keys) == 1) {
      $requested_id = $get_keys[0];
      $what = "rate";
    }
  }

  if ($what == "create") {
    include("content/create.php");
  } else if ($what == "rate") {
    include("content/rate.php");
  } else if ($what == "results") {
    include("content/results.php");
  } else {
    include("includes/header.php");
    include("content/welcome.php");
    include("includes/footer.php");
  }

?>