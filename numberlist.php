<!DOCTYPE html>
<html>
<head>
    <title>Even Numbers</title>
    <meta charset'"utf-8">
</head>
<body>

<?php

    $number = 0;
    while ($number <= 100) {
        $number++;
        if ($number % 2 == 0) {
            print($number);
            echo (" ");
        }
    }
    
?>

</body>
</html>