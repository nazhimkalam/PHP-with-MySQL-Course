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

      // finding the query by id
      function find_subjects_by_id($id){
        global $db;
        $sql_query = "SELECT * FROM subjects WHERE id='".$id."'";
        $result_set = mysqli_query($db, $sql_query);
        confirm_result_set($result_set, $sql_query);

        // returns the result as an array to the subject data variable
        $subject_data = mysqli_fetch_assoc($result_set);
        
        // since the data is stored in the variable called subject_data we can clear off the result_set
        mysqli_free_result($result_set);

        return $subject_data;
      }

      function inserting_into_database($subject){
        global $db;
        // Since this is a POST request we are inserting the data into the database
        $sql_query = "INSERT INTO subjects(menu_name, position, visible) ";
        $sql_query .= " VALUES ('".$subject['menu_name']."', '".$subject['position']."', '".$subject['visible']."');";

        // For insert statement the $result_set returns "true" / "false"
        $result_set = mysqli_query($db, $sql_query);

        if(!$result_set){
            // if the INSERT failed
            echo "Error: <br />";
            echo mysqli_error($db); // display the error result clearly 
            db_disconnect($db);     // disconnect the database  
            exit();                 // stops further execution
        }
      }

      function updating_record_in_database($subject){
        global $db;
        
        // UPDATING INTO THE DATABASE
        $sql_query = "UPDATE subjects SET ";
        $sql_query .= "menu_name = '" . $subject['menu_name'] . "', ";
        $sql_query .= "position = '" . $subject['position'] . "', ";
        $sql_query .= "visible = '" . $subject['visible'] . "'";
        $sql_query .= "WHERE id='" .$subject['id'] . "'";
        $sql_query .= "LIMIT 1";

        // FOR UPDATE STATEMENTS UPDATE $result gives a true or false
        $result = mysqli_query($db, $sql_query);

        if($result){
          return true;
        } else{
          // when update failed
          echo mysqli_error($db);
          db_disconnect();
          exit();
        }

      }

      function find_all_subjects(){
        global $db;
        // SELECTING ALL THE DATA IN THE DATABASE ON THE subjects TABLE
        //  this is a query string which is passed into a variable $subject_query
        $subject_query = "SELECT * FROM subjects ORDER BY id ASC";

        // getting the  RESULT SET from the executed query STRING
        $subject_result_set = mysqli_query($db, $subject_query);

        // checking result set available or not using the function you created in the database.php file
        confirm_result_set($subject_result_set,$subject_query);

        return $subject_result_set;
      }

      function delete_subject($id){
        global $db;
        $sql_query = "DELETE FROM subjects WHERE id='".$id."' LIMIT 1";

        // For DELETE statements, $result will be true/ false
        $result = mysqli_query($db, $sql_query);

        if($result){
          return true;
        }else{
          echo mysqli_error($db);
          db_disconnect($db);
          exit();
        }
      }

      function find_all_pages(){
        global $db;
        //  this is a query string which is passed into a variable $page_query
        $page_query = "SELECT * FROM pages ORDER BY subject_id ASC, position ASC";

        // getting the  RESULT SET from the executed query STRING
        $page_result_set = mysqli_query($db, $page_query);

        // checking result set available or not using the function you created in the database.php file
        confirm_result_set($page_result_set,$page_query);

        return ($page_result_set);
      }

      function find_page_by_id($id){
        global $db;
        
        $sql_query = "SELECT * FROM pages WHERE id='".$id."';";
        $result = mysqli_query($db, $sql_query);
        confirm_result_set($result,$sql_query);

        $page = mysqli_fetch_assoc($result);  // gets the result array into a variable

        mysqli_free_result($result);  // clearing the $result variable
        return $page;
      }

      function insert_page($page){
        global $db;
        
        $sql_query = "INSERT INTO pages ";
        $sql_query .= "(subject_id, menu_name, position, visible, content)";
        $sql_query .= "VALUES (";
        $sql_query .= "'" . $page['subject_id'] . "',";
        $sql_query .= "'" . $page['menu_name'] . "',";
        $sql_query .= "'" . $page['position'] . "',";
        $sql_query .= "'" . $page['visible'] . "',";
        $sql_query .= "'" . $page['content'] . "'";
        $sql_query .= ")";

        // for INSERT statements, $result is true / false
        $result = mysqli_query($db, $sql_query);

        if ($result) {
          return true;
        } else{
          // Insert failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit();
        }
      }

      function update_page($page){
        global $db;

        $sql_query = "UPDATE pages SET ";
        $sql_query .= "subject_id='".$page['subject_id']."', ";
        $sql_query .= "menu_name='".$page['menu_name']."', ";
        $sql_query .= "position='".$page['position']."', ";
        $sql_query .= "visible='".$page['visible']."', ";
        $sql_query .= "content='".$page['content']."' ";
        $sql_query .= "WHERE id='".$page['subject_id']."';";

        // For UPDATE statements, $result is true/false
        $result = mysqli_query($db, $sql_query);

        if($result){
          return true;
        } else{
          // Update Failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit();
        }
        
      }

      function delete_page($id){
        global $db;
        
        $sql_query = "DELETE FROM pages ";
        $sql_query .= "WHERE id='".$id."' ";
        $sql_query .= "LIMIT 1";

        // for delete statement $result is true / false
        $result = mysqli_query($db, $sql_query);

        if ($result) {
          return true;
        } else{
          echo mysqli_error($db);
          db_disconnect();
          exit();
        }
        
      }
?>