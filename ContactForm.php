<!DOCTYPE html>

<html>

<head>
<title>Contact Me</title>
</head>

<body>

<?php

function validateInput($data, $fieldName) { // Validates Input
    global $errorCount; // Get global variable errorCount
    if (empty($data)) { // Check for empty field
        echo "\"$fieldName\" is a required field.<br />\n"; // Error message
        ++$errorCount; // Add to error count
        $retval = ""; // Set blank return value
    }
    else { // Not empty
        $retval = trim($data); // Delete whitespace from input
        $retval = stripslashes($retval); // Cleans up return value by removing backslashes
    }
    return($retval); // Return return value
}

function validateEmail($data, $fieldName) { // Validate Email Input
    global $errorCount; // Get global variable errorCount
    if (empty($data)) { // Check for empty field
        echo "\"$fieldName\" is a required field.<br />\n"; // Error message
        ++$errorCount; // Add to error count
        $retval = ""; // Set blank return value
    }
    else { // Not empty
        $retval = filter_var($data, FILTER_SANITIZE_EMAIL); // Checks if valid email address
        if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) { // If not valid
            echo "\"$fieldName\" is not a valid e-mail address.<br />\n"; // Error Message
            ++$errorCount; // Add to error count
        }
    }
    return($retval); // Return return value
}

function displayForm($Sender, $Email, $Subject, $Message) { // Displays Form, sets text style, calls php file, creates all inputs, clear forms, submits, etc etc
    ?> <h2 style = "text-align:center">Contact Me</h2> 
    <form name="contact" action="ContactForm.php" method="post">
        <p>Your Name:
            <input type="text" name ="Sender" value="<?php echo $Sender; ?>" /></p>
        <p>Your E-Mail:
            <input type="text" name ="Email" value="<?php echo $Email; ?>" /></p>
        <p>Subject:
            <input type="text" name ="Subject" value="<?php echo $Subject; ?>" /></p>
        <p>Message:<br />
            <textarea name="Message"><?php echo $Message; ?></textarea></p>
        <p><input type="reset" value="Clear Form" />&nbsp; &nbsp;
            <input type="submit" name="Submit" value="Send Form" /></p>
    </form>
    <?php
}


// Declare all variables
$ShowForm = TRUE;
$errorCount = 0;
$Sender = "";
$Email = "";
$Subject = "";
$Message = "";

if (isset($_POST['Submit'])) { // Checks if submit button is clicked
    $Sender = validateInput($_POST['Sender'],"Your Name"); // Validates Sender
    $Email = validateEmail($_POST['Email'],"Your E-mail"); // Validates Email
    $Subject = validateInput($_POST['Subject'],"Subject"); // Validates Subject
    $Message = validateInput($_POST['Message'],"Message"); // Validates Message
    if ($errorCount==0) { // If no errors, do not display form again
        $ShowForm = FALSE;
    }
    else { // If there are errors, show form again
        $ShowForm = TRUE;
    }
}

if ($ShowForm == TRUE) { // Checks if ShowForm is true
    if ($errorCount == 0) { // Added this because without it, the form never initially displays
        displayForm($Sender,$Email,$Subject,$Message); // Displays form
    }
    if ($errorCount>0) { // Displays form again with error if info is wrong
        echo "<p>Please re-enter the form information below. </p>\n";
        displayForm($Sender,$Email,$Subject,$Message);
    }
   
}
else { // ShowForm is false, attempts to send the email. Never works for me because port is not set up, but it attempts it. 
    $SenderAddress = "$Sender <$Email>"; 
    $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";
    
    $result = mail("recipient@example.com", $Subject, $Message, $Headers);

    if($result) {
        echo "<p>Your message has been sent. Thank you, ". $Sender . ".</p>\n";
    }
    else {
        echo "<p>There was an error sending your message " . $Sender . ".</p>\n";
    }
}

?>

</body>

</html>