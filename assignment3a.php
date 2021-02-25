<!DOCTYPE html>
<head>
<title>Cost Per Square Foot Area Function</title>
</head>
<body>
<h2>Total Property Cost Calculator</h2>

<?php

    // Declare original variables
    $length = 20;
    $width = 4; 
    $ftCost = 75;

    // Define rArea() function
    function rArea($length,$width) {
        $area = $length * $width;
        return $area;
    }

    //Set to variable for use in echo and totalCost() instead of calling it again twice
    $area = rArea($length ,$width);

    echo "A room of length " . $length . "ft and width " . $width . "ft has an area of " . $area .".";

    // Define totalCost() without unnecessary $cost variable
    function totalCost($area,$ftCost) {
        $tcost = $area * $ftCost;
        return $tcost;
    }

    // Set function to a variable so we can reuse the value
    $tcost = totalCost($area,$ftCost);

    echo " The total cost of a room of length " . $length . "ft and width " . $width . "ft area at $" . $ftCost  . " per square foot is $" . $tcost .".";

?>
</body>
</html>