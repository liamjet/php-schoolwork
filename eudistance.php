<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EU Distance</title>
</head>
<body>
<h1>EU Distance</h1>
<?php

$Distances = array(
    "Berlin" => array("Berlin" => 0, "Moscow" => 1607.99, "Paris" => 876.96, "Prague" => 280.34, "Rome" => 1181.67),
    "Moscow" => array("Berlin" => 1607.99, "Moscow" => 0, "Paris" => 2484.92, "Prague" => 1664.04, "Rome" => 2374.26),
    "Paris" => array("Berlin" => 876.96, "Moscow" => 641.31, "Paris" => 0, "Prague" => 885.38, "Rome" => 1105.76),
    "Prague" => array("Berlin" => 280.34, "Moscow" => 1664.04, "Paris" => 885.38, "Prague" => 0, "Rome" => 922),
    "Rome" => array("Berlin" => 1181.67, "Moscow" => 2374.26, "Paris" => 1105.76, "Prague" => 922, "Rome" => 0));
$KMtoMiles = 0.62;

if (isset($_GET["submit"])) {
    if (!empty($_GET["Capital1"]) && !empty($_GET["Capital2"])) {
        echo "The distance between " . $_GET["Capital1"] . " and " . $_GET["Capital2"] . " is " . $Distances[$_GET["Capital1"]][$_GET["Capital2"]] . " km or " . $Distances[$_GET["Capital1"]][$_GET["Capital2"]] * $KMtoMiles . " miles.\n";
    }
    else {
        echo "Please enter two valid capitals.";
    }
}
?>

<form action="eudistance.php" method="get">
    <p>Enter One Capital (Berlin, Moscow, Paris, Prague, Rome)</p>
    <p>Start Location: <input type="text" name="Capital1" /></p>
    <p>Enter Another Capital (Berlin, Moscow, Paris, Prague, Rome)</p>
    <p>End Location: <input type="text" name="Capital2" /></p>
        <input type="submit" name="submit" value="Submit" />
        <input type="reset" name="reset" value="Reset" />
    </p>
</form>


</body>
</html>