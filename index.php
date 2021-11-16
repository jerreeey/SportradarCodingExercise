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
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="script.js"></script>
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
          <h2>Add an event</h2>
            <fieldset>
                <legend style="display: none">Add an event</legend>
                <form id="AddGamesForm" method="post">
                    <label>Select date:

                        <input name="Time" id="datetime" type="datetime-local">
                    </label>
                    <label>Select a sport:
                        <select name="Sport">
                            <?php $sport->showAllSports(); ?>
                        </select>
                    </label>
                    <label>Select competition:
                        <select name="Competition">
                            <?php $competition->showAllCompetitions(); ?>
                        </select>
                    </label>
                    <label>Select matchday:
                        <select name="Matchday">
                            <?php $matchday->showAllMatchdays(); ?>

                        </select>
                    </label>
                    <label>Select home team:
                        <select name="Home">
                            <?php $teams->showAllTeams(); ?>
                        </select>
                    </label>
                    <label>Select away team:
                        <select name="Guest">
                            <?php $teams->showAllTeams(); ?>
                        </select>
                    </label>
                    <input type="submit" id="btnSubmit">Add game</input>
                </form>
            </fieldset>
            <h2>Show events</h2>
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