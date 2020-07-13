<?php

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

      // Page Redirection
      function redirect_to($location){
        header("Location: ".$location);
        exit();
      }

      // Detecting if it is POST request
      function is_post_request(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
      }

      // Detecting if it is GET request
      function is_get_request(){
        return $_SERVER['REQUEST_METHOD'] == 'GET';
      }
?>