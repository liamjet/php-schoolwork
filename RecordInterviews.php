<?php

if (empty($_POST['interviewer_name']) || empty($_POST['position']) || empty($_POST['date']) || empty($_POST['candidate_name'])) {
    echo "<p>Please at least enter the interviewer's name, position, date, and candidate's name.</p>";
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
        $DBName = "InterviewInformation";

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

        $TableName = "Interviews";
        $SQLstring = "SHOW TABLES LIKE '$TableName'";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);

        if (mysqli_num_rows($QueryResult) == 0) {
            $SQLstring = "CREATE TABLE $TableName (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, interviewer_name VARCHAR(40), position VARCHAR(40), date INT, candidate_name VARCHAR(40), communication_abilities VARCHAR(100), computer_skills VARCHAR(100), business_knowledge VARCHAR(100), interviewer_comments VARCHAR(100))";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);

            if ($QueryResult === FALSE) {
                echo "<p>Unable to create the table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }

        
        $interviewerName = stripslashes($_POST['interviewer_name']);
        $position = stripslashes($_POST['position']);
        $date = stripslashes($_POST['date']);
        $candidateName = stripslashes($_POST['candidate_name']);
        $communicationAbilities = stripslashes($_POST['communication_abilities']);
        $computerSkills = stripslashes($_POST['computer_skills']);
        $businessKnowledge = stripslashes($_POST['business_knowledge']);
        $interviewerComments = stripslashes($_POST['interviewer_comments']);

        $SQLstring = "INSERT INTO $TableName VALUES(NULL, '$interviewerName', '$position', '$date', '$candidateName', '$communicationAbilities', '$computerSkills', '$businessKnowledge', '$interviewerComments')";
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
