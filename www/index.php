<?php

  // include config
  include("/home/d/config.inc.php");

  $path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
  $elements = explode('/', $path);                // Split path on slashes
  if(empty($elements[0]) && sizeof(array_keys($_POST)) == 0) {                       // No path elements means home
    $what = "welcome";
  } else {
  
    if (isset($_REQUEST["what"])) {
      $what = $_REQUEST["what"];
    } else {
  
      // this could be a requested rating page
      if (sizeof($elements) == 1) {
        $requested_id = $elements[0];
        $what = "rate";
      }
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
