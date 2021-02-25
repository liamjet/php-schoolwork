<?php
session_start();
?>

<html>

<head>
    <title>My Session</title>
</head>

<body>
<h1>Menu</h1>

<form action="checkout.php" method="get">
    <p>Hamburger - Quantity: <input type="text" name="Hamburger" /></p>
    <p>Cheeseburger - Quantity: <input type="text" name="Cheeseburger" /></p>
    <p>Double Double - Quantity: <input type="text" name="DoubleDouble" /></p>
    <p>Fries - Quantity: <input type="text" name="Fries" /></p>
    <p>Shake - Quantity: <input type="text" name="Shake" /></p>
    <p>Hot Cocoa - Quantity: <input type="text" name="HotCocoa" /></p>
        <input type="submit" name="submit" value="Proceed to Checkout" />
        <input type="reset" name="reset" value="Reset" />
    </p>
</form>

</body>
</html>