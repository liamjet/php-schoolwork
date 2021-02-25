<!DOCTYPE html>

<html>

<head>

<title>Compare Strings</title>

</head>

<body>

<h1>Compare Strings</h1><hr />

<?php 

function sameVar($var1,$var2) {
    echo "String " . $var1 . " is the same as " . $var2;
}

function diffVar($var1,$var2) {
    echo "String " . $var1 . " is not the same as " . $var2;
}

$firstString = "Geek2Geek";

$secondString = "Geezer2Geek";
 
if (!empty($firstString) || !empty($secondString)) {
    if ($firstString == $secondString) {
        sameVar($firstString,$secondString);
    }
    else {
        diffVar($firstString,$secondString);
    }
}
else { 
    echo "<p>Either the \$firstString variable or the \$secondString variable does not contain a value so the two strings cannot be compared. </p>";
    }

?>

</body>

</html>