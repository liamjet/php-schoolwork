<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Sorted</title>
</head>
<body>
<h1>Song Organizer</h1>
<?php

// The if statement first checks if the field is entered. Then it checks if the file exists and is of a size greater than 0 
if (isset($_GET['action'])) {
    if ((file_exists("SongOrganizer/songs.txt")) && (filesize("SongOrganizer/songs.txt") != 0)) {
        $SongArray = file("SongOrganizer/songs.txt");

        // This switch statement chooses between three cases based on the form submission. Either it removes duplicates using array_unique and array_values to take out duplicates, it sorts the array, or randomizes it.
        switch ($_GET['action']) {
            case 'Remove Duplicates':
                $SongArray = array_unique($SongArray);
                $SongArray = array_values($SongArray);
                break;
            case 'Sort Ascending':
                sort($SongArray);
                break;
            case 'Shuffle':
                shuffle($SongArray);
                break;
        }
        // If the number of Songs in the array is greater than 0, a new string is created which lists all the songs in the array. Then, the text file is opened and the list is written into the file.
        if (count($SongArray) > 0) {
            $NewSongs = implode($SongArray);
            $SongStore = fopen("SongOrganizer/songs.txt", "wb");
            if ($SongStore === false) {
                echo "There was an error updating the song file\n";
            }
            else {
                fwrite($SongStore, $NewSongs);
                fclose($SongStore);
            }
        }
        else unlink("SongOrganizer/songs.txt");
    }
}

// Checks if submit button has been hit
if (isset($_POST['submit'])) {
    $SongToAdd = stripslashes($_POST['SongName']) . "\n";
    $ExistingSongs = array();

    // Checks if the next file exists and that it is of size greater than 0. Checks if the song entered is already on the list. 
    // If it isn't, write the song to the text file.
    if (file_exists("SongOrganizer/songs.txt") && filesize("SongOrganizer/songs.txt") > 0) {
        $ExistingSongs = file("SongOrganizer/songs.txt");

        if (in_array($SongToAdd, $ExistingSongs)) {
            echo "<P>The song you entered already exists!<br />\n";
            echo "Your song was not added to the list.</p>";
        }
        else {
            $SongFile = fopen("SongOrganizer/songs.txt", "ab");
            if ($SongFile === false) {
                echo "There was an error saving your message!\n";
            }
            else {
                fwrite($SongFile, $SongToAdd);
                fclose($SongFile);
                echo "Your song has been added to the list.\n";
            }
        }
    }
}

// If the file doesn't exist and is of size zero, echo that there are no songs. Otherwize, print the table that lists all the songs.
if ((!file_exists("SongOrganizer/songs.txt")) || (filesize("SongOrganizer/songs.txt") == 0)) {
    echo "<p>There are no songs in the list.</p>\n";
}
else {
    $SongArray = file("SongOrganizer/songs.txt");
    echo "<table border=\"1\" width=\"100%\" style=\"background-color:lightgray\">\n";
    foreach ($SongArray as $Song) {
        echo "<tr>\n";
        echo "<td>" . htmlentities($Song) . "</td>";
        echo "</tr>\n";
    }
    echo "</table>\n";
}

?>

<p> <a href="SongOrganizer.php?action=Sort%20Ascending"> Sort Song List</a><br />
    <a href="SongOrganizer.php?action=Remove%20Duplicates"> Remove Duplicate Songs</a><br />
    <a href="SongOrganizer.php?action=Shuffle"> Randomize Song List</a><br />
</p>

<form action="SongOrganizer.php" method="post">
    <p>Add a New Song</p>
    <p>Song Name: <input type="text" name="SongName" /></p>
    <p>
        <input type="submit" name="submit" value="Add Song to List" />
        <input type="reset" name="reset" value="Reset Song Name" />
    </p>
</form>

</body>
</html>
