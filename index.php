<?php
include("config.inc.php");
include("Fixture.class.php");
include("Team.class.php");
include ("Competition.class.php");
include ("Matchday.class.php");
include("Sport.class.php");

$fixtures= new Fixture();
$teams= new Team();
$matchday= new Matchday();
$competition= new Competition();
$sport= new Sport();

?>

<!DOCTYPE html>
<html lang="en">
    <head> <!---Add jquery, script and css-file  -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="script.js"></script>
        <title>Sportradar Calendar</title>
    </head>
    <body><!---navigation -->
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">Sportradar Calendar</a></li>
                <li><a href="index.php">About us</a></li>
            </ul>
        </nav>
        <main>
            <h1>Sportradar Calendar</h1>
          <h2>Add an event</h2>
            <fieldset><!---Form to add new events -->
                <legend style="display: none">Add event</legend>
                <form id="AddGamesForm" method="post">
                    <ul>
                    <li><label>Select date:

                        <input name="Time" id="datetime" type="datetime-local">
                    </label></li>
                    <li>
                        <select id="sportsSelect" name="Sport" onchange="filter()" >
                            <option disabled="true" selected="true">Select sport</option>
                            <?php $sport->showAllSports(); ?>
                        </select>
                    </li>
                    <li>
                        <select id= "compSelect" name="Competition">
                            <option disabled="true" selected="true">Select competiion</option>
                            <?php $competition->showAllCompetitions(); ?>
                        </select>
                   </li>
                    <li>
                        <select name="Matchday">
                            <option disabled="true" selected="true">Select matchday</option>
                            <?php $matchday->showAllMatchdays(); ?>

                        </select>
                    </li>
                    <li>
                        <select id="selectHome" name="Home">
                            <option disabled="true" selected="true">Select home team</option>
                            <?php $teams->showAllTeams(); ?>
                        </select>
                    </li>
                    <li>
                        <select id="selectGuest" name="Guest">
                            <option disabled="true" selected="true">Select away team</option>
                            <?php $teams->showAllTeams(); ?>
                        </select>
                    </li>
                    <li>

                        <input type="submit" id="btnSubmit" value="Add game"></li>
                    </ul>
                </form>
            </fieldset>
            <h2>Show events</h2><!---table to show all events  -->
            <select id="selectSports" oninput="filterFixtures()">
                <option>All sports</option>
                <?php $sport->showAllSports(); ?>
            </select>
            <table id="fixturesTable">
                <tr>
                    <th>Date</th><th>Sports</th><th>Competition</th><th>Matchday</th><th>Home Team</th><th>Away Team</th>
                </tr>
               <?php $fixtures->showFixtures(); ?>
            </table>
        </main>
    </body>
</html>