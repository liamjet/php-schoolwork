<!DOCTYPE html>

<html>

<head>
<title>Show Bowlers</title>
</head>

<body>

<?php

    $file = fopen('bowlers.txt','r');

    $text = fread($file,1024);

    fclose($file);

    echo "<pre> " . $text . "</pre>";

?>

</body>

</html>