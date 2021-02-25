<?php
session_start();

?>

<html>

<head>
    <title>My Session</title>
</head>

<body>
<h1>Checkout</h1>

<?php

echo "<pre>Hamburger - Quantity: " . $_GET['Hamburger'];
echo "<pre>Cheeseburger = Quantity: " . $_GET['Cheeseburger'];
echo "<pre>Double Double = Quantity: " . $_GET['DoubleDouble'];
echo "<pre>Fries = Quantity: " . $_GET['Fries'];
echo "<pre>Shake = Quantity: " . $_GET['Shake'];
echo "<pre>Hot Cocao = Quantity: " . $_GET['HotCocoa'];

?>

<p><a href="destroysession.php?<?php echo htmlspecialchars(SID); ?>">Check Out</a></p>