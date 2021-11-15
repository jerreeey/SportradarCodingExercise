<?php
include("config.inc.php");
include("Fixtures.class.php");

$fixtures= new Fixtures();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <title>Sportradar Calendar</title>
    </head>
    <body>
        <nav>
            <a href="index.php">Home</a>
            <a href="index.php">Sportradar Calendar</a>
            <a href="index.php">About us</a>
        </nav>
        <main>
            <h1>Sportradar Calendar</h1>
          <!-- <h2>Add an event</h2>
            <fieldset>
                <legend style="display: none">Add an event</legend>
                <form>
                    <label>Pick a date:

                        <input id="datetime" type="datetime-local">
                    </label>
                    <label>Select a sport:
                        <select>
                            Todo Function to select sport
                            <option selected disabled value="0"></option>
                        </select>
                    </label>
                    <label>Select home team:
                        <select>
                            Todo Function to select team
                            <option selected disabled value="0">Select!</option>
                        </select>
                    </label>
                    <label>Select away team:
                        <select>
                            Todo Function to select sport
                            <option selected disabled value="0">Select!</option>
                        </select>
                    </label>
                </form>
            </fieldset> -->
            <h2>Show events</h2>
            <table>
               <?php $fixtures->showFixtures(); ?>
            </table>
        </main>
    </body>
</html>