<?php
    require_once('../../../private/initialize.php');

    // Handle form values sent by new.php

    // If it is a post request then we display the content else if it is a get request then we re direct back to the new.php page
    // POST request :- we sending data from the form 
    // GET request :- when we select the Url are hit enter, then it becomes a GET request and does the redirecting 

    if(is_post_request()){
        $subject = [];
        $subject['menu_name'] = $_POST['menu_name'] ?? '';
        $subject['position'] = $_POST['position'] ?? '';
        $subject['visible'] = $_POST['visible'] ?? '';

        // INSERTING DATA INTO THE DATABASE
        inserting_into_database($subject);
        
        $getting_the_new_auto_updated_id = mysqli_insert_id($db);
        redirect_to(url_for('/staff/subjects/show.php?id='.$getting_the_new_auto_updated_id));
    }else{
        redirect_to(url_for('/staff/subjects/new.php'));
    }

?>