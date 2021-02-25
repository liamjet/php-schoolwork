<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Interviews Table</title>
</head>
<body>

<?php
    $user="root";
    $password="";
    $host="localhost";

    $DBConnect = mysqli_connect($host, $user, $password);

    if ($DBConnect === FALSE) echo "<p>Unable to connect to the databse server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    
    else {
        $DBName = "InterviewInformation";

        if (!mysqli_select_db($DBConnect, $DBName)) echo "<p>There are no entries in the table.</p>";

        else {
            $TableName = "Interviews";
            $SQLstring = "SELECT * FROM $TableName";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);

            if (mysqli_num_rows($QueryResult) == 0) echo "<p>There are no entries in the table.</p>";

            else {
                echo "<p>Interview Information:</p>";
                echo "<table width='100%' border='1'>";
                echo "<tr><th>Interviewer Name</th><th>Position</th><th>Date (mmddyyyy)</th><th>Candidate Name</th><th>Communication Abilities</th><th>Computer Skills</th><th>Business Knowledge</th><th>Interviewer Comments</th></tr>";
                while ($Row = mysqli_fetch_array($QueryResult)) {
                    echo "<tr><td>{$Row['interviewer_name']}</td>";
                    echo "<td>{$Row['position']}</ td>";
                    echo "<td>{$Row['date']}</ td>";
                    echo "<td>{$Row['candidate_name']}</ td>";
                    echo "<td>{$Row['communication_abilities']}</ td>";
                    echo "<td>{$Row['computer_skills']}</ td>";
                    echo "<td>{$Row['business_knowledge']}</ td>";
                    echo "<td>{$Row['interviewer_comments']}</ td></ tr>";
                }
            }
            mysqli_free_result($QueryResult);
        }
        mysqli_close($DBConnect);
    }

?>

</body>

</html>