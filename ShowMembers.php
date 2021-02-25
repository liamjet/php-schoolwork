<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DnD Club Members</title>
</head>
<body>

<?php
    $user="root";
    $password="";
    $host="localhost";

    $DBConnect = mysqli_connect($host, $user, $password);

    if ($DBConnect === FALSE) echo "<p>Unable to connect to the databse server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    
    else {
        $DBName = "dndclub";

        if (!mysqli_select_db($DBConnect, $DBName)) echo "<p>There are no entries in the table.</p>";

        else {
            $TableName = "members";
            $SQLstring = "SELECT * FROM $TableName";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);

            if (mysqli_num_rows($QueryResult) == 0) echo "<p>There are no entries in the table.</p>";

            else {
                echo "<p><strong>D&D Club Members:<strong></p>";
                echo "<table width='100%' border='1'>";
                echo "<tr><th>Position</th><th>Name</th><th>Date (mmddyyyy)</th><th>Favorite Class</th><th>Preferences</th></tr>";
                while ($Row = mysqli_fetch_array($QueryResult)) {
                    echo "<tr><td>{$Row['position']}</td>";
                    echo "<td>{$Row['name']}</ td>";
                    echo "<td>{$Row['date']}</ td>";
                    echo "<td>{$Row['class']}</ td>";
                    echo "<td>{$Row['preferences']}</ td></ tr>";
                }
            }
            mysqli_free_result($QueryResult);
        }
        mysqli_close($DBConnect);
    }

?>

</body>

</html>