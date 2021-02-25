<?php 

// Declares age variable and constructor for Movies class. Constructor simply contains logic
// for printing correct price.
class Movies {
    
    private $age;

    public function __construct($age = null) {
        
        if ($age == null) {
            echo "<p>No age entered: $10</p>";
        }
        else if ($age < 5) {
            echo "<p>Less than 5 years old: Free</p>";
        }
        else if ($age < 17) {
            echo "<p>Between 5 and 17 years old: $5</p>";
        }
        else if ($age < 55) {
            echo "<p>Between 18 and 55 years old: $10</p>";
        }
        else {
            echo "<p>Older than 55 years old: $8</p>";
        }
    }
}

?>
<!doctype html>
<html>
<head>
    <title>Movie Ticket Prices</title>
</head>

<body>
    <strong>Ticket Price (test null)</strong>
    <br>
    <?php // Testing all possible outcomes
    $no_age = new Movies();
    ?>
    <strong>Ticket Price (test 1 year old)</strong>
    <br>
    <?php
    $no_age = new Movies(1);
    ?>
    <strong>Ticket Price (test 15 year old)</strong>
    <br>
    <?php
    $no_age = new Movies(15);
    ?>
    <strong>Ticket Price (test 35 year old)</strong>
    <br>
    <?php
    $no_age = new Movies(35);
    ?>
    <strong>Ticket Price (test 70 year old)</strong>
    <br>
    <?php
    $no_age = new Movies(70);
    ?>
</body>