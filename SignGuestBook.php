<?php
// Filename: signguestbook.php

// Checks if either field is empty
if (empty($_POST['first_name']) || empty($_POST['last_name'])) {
    echo "<p>you must enter your first and last name. Click your browser's Back button to return to the Guest Book.</p>";
}
// Enters in localhost password information
else {
    $user="root";
    $password="";
    $host="localhost";

    // Connect to the sql server
    $DBConnect = mysqli_connect($host, $user, $password);

    // Error message if connection fails (server is off, etc etc)
    if ($DBConnect === FALSE) {
        echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    } 
    
    // Sets database name if connection works
    else {
        $DBName = "guestbook";

        // if the database is null, create a SQL database 
        if (!mysqli_select_db($DBConnect, $DBName)) {
            $SQLstring = "CREATE DATABASE $DBName";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);

            // Failstate check for the query errors
            if ($QueryResult === FALSE) {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            } 
            
            // Success message
            else {
                echo "<p>You are the first visitor!</p>";
            }
        }
        // Select database
        mysqli_select_db($DBConnect, $DBName);

        // Create table and check for query errors
        $TableName = "visitors";
        $SQLstring = "SHOW TABLES LIKE '$TableName'";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);

        // If the number of rows is 0, create the table following specifications below
        if (mysqli_num_rows($QueryResult) == 0) {
            $SQLstring = "CREATE TABLE $TableName (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, last_name VARCHAR(40), first_name VARCHAR(40))";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);

            // Failstate if querycheck finds errors. Prints error
            if ($QueryResult === FALSE) {
                echo "<p>Unable to create the table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }

        // Taking information and inserting into SQL table, also query check
        $LastName = stripslashes($_POST['last_name']);
        $FirstName = stripslashes($_POST['first_name']);
        $SQLstring = "INSERT INTO $TableName VALUES(NULL, '$LastName', '$FirstName')";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);

        // Errors for Query check
        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
        } else {
            echo "<h1>Thank you for signing our guest book!</h1>";
        }
        
        // Close connection
        mysqli_close($DBConnect);
    }
}


?>
