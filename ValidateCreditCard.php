<!DOCTYPE html>

<html>

<head>

<title>Validate Credit Card</title>

</head>

<body>

 <h1>Validate Credit Card</h1><hr />

<?php

$CreditCard = array( "", "8910-1234-5678-6543", "OOOO-9123-4567-0123");

foreach ($CreditCard as $CardNumber) {

    if (empty($CardNumber)) { 
    echo "<p>This Credit Card Number is invalid because it contains an empty string.</p>";
    }
    else {
        $CardNum = str_replace("-","",$CardNumber,$i);
        if (is_numeric($CardNum)) {
            echo "<p>The Card Number is " . $CardNum;
        }
        else {
            echo "<p>Warning: Credit Card Number is not numeric.</p>";
        }
    }
}
?>
 
</body>

</html>