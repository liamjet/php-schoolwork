<?php

// Creates a basic class for all contacts, declares getter and setter functions for the name
// and a function to attach the phone number to the name. 
abstract class BaseContact {
    abstract public function get_name();

    abstract public function set_name($name);

    public $phone_number;

    public function __toString() {
        $s = "" . $this->get_name();
        if($this->phone_number) {
            if(count(array($s)) > 0) { // Added array to make $s countable 
                $s .= ": ";
            } else {
                $s .= "Someone's Phone Number: ";
            }
            $s .= $this->phone_number;
        }
        return $s;
    }
}

// The extends keyword creates a "subclass" or makes a class that inherits all functions
// and variables from the "base" class, in this case BaseContact.
//
// This class creates variables for the first and last name. Then it has a constructor
// function that is called when a new instance of a PersonContact is created. It fills
// out the declared getter and setter functions from BaseContact.
class PersonContact extends BaseContact {
    public $first_name;
    public $last_name;

    public function __construct($first_name = null, $last_name = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function get_name() {
        return $this->first_name . " " . $this->last_name;
    }

    public function set_name($name) {
        $split_name = explode(" ", $name, 2);
        $length = count($split_name);
        $rv = true;
        if($length === 0) {
            $rv = false;
        } elseif($length === 1) {
            $this->first_name = $this->last_name = $split_name[0];
        } else {
            $this->first_name = $split_name[0];
            $this->last_name = $split_name[1];
        }
        return $rv;
    }
}

// The getter and setter functions either "get" a value (in this case name) and set it to
// a variable or "set" a value by returning it (and usually printing it). The purpose of 
// these functions is to change private variables.

// This instance of the constructor covers cases where there are no parameters when a new
// instance of the class is created. 
class OrganizationContact extends BaseContact {
    public $name;

    public function __construct($name = null) {
        $this->name = $name;
    }

    public function get_name() {
        return $this->name;
    }

    public function set_name($name) {
        $this->name = $name;
    }
}

?>
<!doctype html>
<html>
<head>
    <title>Object Oriented Programming - Simple Class</title>
</head>

<body>
        <strong>Person Contact, Empty Constructor, Two Names</strong>
    <br>
    <?php
        // Example the reserve word "new"

        // Not sure what to say here, so I'll explain the "new" word. "new" creates a 
        // new instance of a class or object.
        $angelo = new PersonContact();
        $angelo->set_name("Angelo Roncalli");
        $angelo->phone_number = "777-777-7777";
    ?>
    <p><?php print $angelo ?></p>

    <strong>Person Contact, Empty Constructor, Three Names</strong>
    <br>
    <?php
        $john = new PersonContact();
        $john->set_name("John Giuseppe Roncalli");
        $john->phone_number = "777-777-7777";
    ?>
    <p><?php print $john ?></p>

    <strong>Person Contact, Parameterized Constuctor</strong>
    <br>
    <?php
        $mary = new PersonContact("Mary","Roncalli");
        $mary->phone_number = "777-777-7777";
    ?>
    <p><?php print $mary ?></p>

    <strong>Organization Contact, Empty Constructor</strong>
    <br>
    <?php
        $parish = new OrganizationContact();
        $parish->set_name("Parish");
        $parish->phone_number = "777-777-7777";
    ?>
    <p><?php print $parish ?></p>

    <strong>Organization Contact, Parameterized Constructor</strong>
    <br>
    <?php
        $parish = new OrganizationContact("Parish"); // Typo fixed? Was PersonContact, changed to OrganizqationContact
        $parish->phone_number = "777-777-7777";
    ?>
    <p><?php print $parish ?></p>

</body>
</html>