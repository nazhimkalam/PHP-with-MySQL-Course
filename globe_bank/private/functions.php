<?php

    // this functions get the path of the script within the public and adds with the ROOT url which is,
    // http://localhost:85/PHP-with-MySQL-Course/globe_bank/public/
      function url_for($script_path) {
        // add the leading '/' if not present thats why we check with the first character of the script_path(script_path[0])
        if($script_path[0] != '/') {
          $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path;
      }

      // Header Modifiers
      function error_404(){
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        exit();
      }

      function error_500(){
        header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
        exit();
      }

      // Page Redirection,
      // this specific header called Location does redirection of the webpages
      // NOTE: There are specific headers for specific tasks like throwing and error shown in the above function
      function redirect_to($location){
        header("Location: ".$location);
        exit();
      }

      // Detecting if it is POST request
      // returns True if POST method else false
      function is_post_request(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
      }

      // Detecting if it is GET request
      // returns True if GET method else false
      function is_get_request(){
        return $_SERVER['REQUEST_METHOD'] == 'GET';
      }
?>