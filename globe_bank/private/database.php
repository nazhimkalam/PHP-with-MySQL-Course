<!-- we store our functions here related to the database -->

<?php 

    require_once('db_credentials.php');          // this calls the db_credentials.php file

    // this function is used to connect to the database
    function db_connect(){
        // this "DB_SERVER, DB_USER, DB_PASS, DB_NAME" is defined in the 'db_credentials.php' file and is loaded here. 
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        confirm_db_connection();         // this throws an error if no connection made and handles it
        return $connection; 
    }

    // this function is used to disconnect from the database which is connected to $connection
    function db_disconnect($connection){
        // checks if the open connection is available to be closed using the 'isset' function to check
        if(isset($connection)){
            mysqli_close($connection);
        }
    }


    // Error checking when dealing with database
    
    //1.) Displaying a particular message if the connection is not made.
    function confirm_db_connection(){
        if (mysqli_connect_errno()) {         // the "." refers to concatenation
            $error_message = "---Database connection failed: ";
            $error_message .= mysqli_connect_error();
            $error_message .= "(". mysqli_connect_errno(). ") ---";
            exit($error_message);
        }
    }

    //2.) Confirm result set (checking if the result set will contain data of a specific query, if not displaying an error msg)
    function confirm_result_set($result_set,$entered_query){
        // difference between echo and exit is that, when exit it stops further execution but echo means it will only print the output
        if(!$result_set){
            echo $entered_query;
            exit("<br />Database query failed."); 
        }
    }

?>