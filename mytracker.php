<?php
session_start();

    if (empty($_SESSION['count'])) {
        $_SESSION['count'] = 1;
    }
    else {
        $_SESSION['count']++;
    }
?>

<html>

<head>
    <title>Tracker</title>
</head>

<body>
<h1>Tracker</h1>
<?php


echo "Number of views: " . $_SESSION['count'];


if ($_SESSION['count'] == 5) {
    echo "\nYou have viewed this page 5 times!!!";
}
if ($_SESSION['count'] == 10) {
    echo "\nYou have viewed this page 10 times!!!";
}
if ($_SESSION['count'] == 15) {
    echo "\nYou have viewed this page 15 times!!!";
}
if ($_SESSION['count'] == 20) {
    echo "\nYou have viewed this page 20 times, resetting cookie!";
    $_SESSION['count'] = 0;
}

?>

</body>
</html>