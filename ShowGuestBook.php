<!DOCTYPE html>
<!-- Filename: showguestbook.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Guest Book</title>
</head>
<body>

<?php
    // Enter local information
    $user="root";
    $password="";
    $host="localhost";

    // Connect to sql server
    $DBConnect = mysqli_connect($host, $user, $password);

    // Failstate for connection
    if ($DBConnect === FALSE) echo "<p>Unable to connect to the databse server.</p>" . "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
    
    // Proceed with success. Set database name
    else {
        $DBName = "guestbook";

        // if select fails, no table meaning no entries
        if (!mysqli_select_db($DBConnect, $DBName)) echo "<p>There are no entries in the guest book!</p>";

        // Attempts to select visitors table
        else {
            $TableName = "visitors";
            $SQLstring = "SELECT * FROM $TableName";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);

            // Failstate, no visitors exist
            if (mysqli_num_rows($QueryResult) == 0) echo "<p>There are no entries in the guest book!</p>";

            // Success, number of visitors and table display
            else {
                echo "<p>The following visitors have signed our guest book:</p>";
                echo "<table width='100%' border='1'>";
                echo "<tr><th>First Name</th><th>Last Name</th></tr>";
                while ($Row = mysqli_fetch_array($QueryResult)) {
                    echo "<tr><td>{$Row['first_name']}</td>";
                    echo "<td>{$Row['last_name']}</ td></tr>";
                }
            }
            // Free memory
            mysqli_free_result($QueryResult);
        }
        // Close connection
        mysqli_close($DBConnect);
    }

?>

</body>

</html>