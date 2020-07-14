<!-- we store our functions here related to the database -->

<?php 

    require_once('db_credentials.php');          // this calls the db_credentials.php file

    // this function is used to connect to the database
    function db_connect(){
        // this "DB_SERVER, DB_USER, DB_PASS, DB_NAME" is defined in the 'db_credentials.php' file and is loaded here. 
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        return $connection; 
    }

    // this function is used to disconnect from the database which is connected to $connection
    function db_disconnect($connection){
        // checks if the open connection is available to be closed using the 'isset' function to check
        if(isset($connection)){
            mysqli_close($connection);
        }
    }

?>