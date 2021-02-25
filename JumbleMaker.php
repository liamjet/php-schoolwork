<!DOCTYPE html>

<html>

<head>
<title>Jumble Maker</title>
</head>

<body>

    <?php

    function displayError($fieldName,$errorMsg) {
        echo $errorMsg;
        global $errorCount;
        $errorCount++;
    }

    function validateWord($data,$fieldName) {
        $errorMsg1 = "Error in " . $fieldName . ": Word not between 4 and 7 characters. ";
        $errorMsg2 = "Error in " . $fieldName . ": Word contains non-letter characters. ";
        if ((strlen($data) < 4 || strlen($data) > 7)) {
            displayError($fieldName,$errorMsg1);
        }
        if (!preg_match('/[A-Za-z]/',$data)) {
            displayError($fieldName,$errorMsg2);
        }
        else {
            $data = strtoupper($data);
            $data = str_shuffle($data);
            return $data;
        }
    }

    $errorCount = 0;

    $words = array();

    $words[] = validateWord($_POST['Word1'], "Word 1");

    $words[] = validateWord($_POST['Word2'], "Word 2");

    $words[] = validateWord($_POST['Word3'], "Word 3");

    $words[] = validateWord($_POST['Word4'], "Word 4");

    if ($errorCount>0) {
        echo "Please use the \"Back\" button to re-enter the data.<br />\n";
    }
    
    else {
       $wordnum = 0;
    
        foreach ($words as $word) {
            echo "Word ".++$wordnum.": $word<br />\n";
        }
    }

    ?>

</body>

</html>