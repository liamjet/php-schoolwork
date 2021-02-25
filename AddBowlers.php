<!DOCTYPE html>

<html>

<head>
<title>Add Bowlers</title>
</head>

<body>

<?php

if (empty($_POST['full_name'])) {
    echo "<p>You must enter your first and last name. Click your browser's Back button to return to the input page.</p>\n";
}
else if (empty($_POST['age'])) {
    echo "<p>You must enter your age. Click your browser's Back button to return to the input page.</p>\n";
}
else if (empty($_POST['average'])) {
    echo "<p>You must enter your average score. Click your browser's Back button to return to the input page.</p>\n";
}
else {
    $fullName = addslashes($_POST['full_name']);
    $age = addslashes($_POST['age']);
    $average = addslashes($_POST['average']);
    $bowlers = fopen("bowlers.txt", "ab");
    if (is_writeable("bowlers.txt")) {
        if (fwrite($bowlers, $fullName . ", " . $age . ", " . $average . "\n")) {
            echo "<p>Thank you for your information.</p>\n";
        }
        else {
            echo "<p>Cannot add your information.</p>";
        }
    }
    else {
        echo "<p>Cannot write to the file.</p>\n";
    }
    fclose($bowlers);
}

?>

</body>

</html>