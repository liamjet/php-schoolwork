<?php

if(!isset($_POST['position'])) { 
    echo "<p>Please check at least one box.</p>";
    ?>

    <html>
    <p><a href="JoinDnD.html">Go Back </a></p>
    </html>

    <?php
}

else if (empty($_POST['name']) || empty($_POST['date'])) {
    echo "<p>Please at least enter your name and the current date.</p>";

    ?>

    <html>
    <p><a href="JoinDnD.html">Go Back </a></p>
    </html>
    
    <?php
}

else {
    $user="root";
    $password="";
    $host="localhost";

    $DBConnect = mysqli_connect($host, $user, $password);

    if ($DBConnect === FALSE) {
        echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    } 
    
    else {
        $DBName = "dndclub";

        if (!mysqli_select_db($DBConnect, $DBName)) {
            $SQLstring = "CREATE DATABASE $DBName";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);

            if ($QueryResult === FALSE) {
                echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            } 
            
            else {
                echo "<p>You are the first visitor!</p>";
            }
        }
        mysqli_select_db($DBConnect, $DBName);

        $TableName = "members";
        $SQLstring = "SHOW TABLES LIKE '$TableName'";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);

        if (mysqli_num_rows($QueryResult) == 0) {
            $SQLstring = "CREATE TABLE $TableName (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, position VARCHAR(100), name VARCHAR(40), date INT, class VARCHAR(40), preferences VARCHAR(100))";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);

            if ($QueryResult === FALSE) {
                echo "<p>Unable to create the table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }

        
        $array = $_POST['position'];
        
        $position = implode(", ", $array);
        $position = stripslashes($position);
        $name = stripslashes($_POST['name']);
        $date = stripslashes($_POST['date']);
        $class = stripslashes($_POST['class']);
        $preferences = stripslashes($_POST['preferences']);


        $SQLstring = "INSERT INTO $TableName VALUES(NULL, '$position', '$name', '$date', '$class', '$preferences')";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);

        // Errors for Query check
        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
        } else {
            echo "<h1>Input Recorded.</h1>";
        }
        
        // Close connection
        mysqli_close($DBConnect);
    }
}


?>
