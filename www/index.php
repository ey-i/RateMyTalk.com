<?php

  // include config
  require "/home/d/config.inc.php";

  $what = "welcome";

  $path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
  $elements = explode('/', $path);                // Split path on slashes
  if(empty($elements[0]) && sizeof(array_keys($_POST)) == 0) {                       // No path elements means home
    $what = "welcome";
  } else {
  
    if (isset($_REQUEST["what"])) {
      $what = $_REQUEST["what"];
    } else {
  
      // sanity check
      if (sizeof($elements) > 2) {
        header("Location: /");
        die();
      }

      // this is a requested results page
      if (sizeof($elements) == 2) {

        $requested_id = $elements[0];
        if ($elements[1] == "results") {
          $what = "results";
        } else if ($elements[1] == "store") {
          $what = "store";

        } else {
          header("Location: /$requested_id");
          die();
        }
        
      }

      // this could be a requested rating page
      if (sizeof($elements) == 1) {
        $requested_id = $elements[0];
        $what = "rate";
      }
    }

  }

  if ($what == "create") {
    include("includes/create.php");
  } else if ($what == "rate") {
    include("includes/rate.php");
  } else if ($what == "store") {
    include("includes/store.php");
  } else if ($what == "results") {
    include("includes/results.php");
  } else {
    include("content/header.php");
    include("content/welcome.php");
    include("content/footer.php");
  }

?>
