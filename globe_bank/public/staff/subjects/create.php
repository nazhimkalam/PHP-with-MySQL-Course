<?php
require_once('../../../private/initialize.php');

// Handle form values sent by new.php

// If it is a post request then we display the content else if it is a get request then we re direct back to the new.php page
// POST request :- we sending data from the form 
// GET request :- when we select the Url are hit enter, then it becomes a GET request and does the redirecting 

if(is_post_request()){
    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo "Form parameters<br />";
    echo "Menu name: " . $menu_name . "<br />";
    echo "Position: " . $position . "<br />";
    echo "Visible: " . $visible . "<br />";
}else{
    redirect_to(url_for('/staff/subjects/new.php'));
}

?>