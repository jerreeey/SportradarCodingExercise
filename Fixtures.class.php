<?php
include("config.inc.php");
include ("db.class.php");

class Fixtures
{


    public function showFixtures(){
        $db=new db();
        $fixtures= $db->getAllGames();
            ?>
            <tr>
                <th>Date</th>

                    <?php foreach($fixtures as $f){ echo "<td>". $f['startTime'] ."</td>";}?>

            </tr>
            <tr>
                <th>Sports</th>
                <?php foreach($fixtures as $f){ echo "<td>". $f['sportsName'] ."</td>";}?>
            </tr>
            <tr>
                <th>Competition</th>
                <?php foreach($fixtures as $f){ echo "<td>". $f['competitionName'] ."</td>";}?>
            </tr>
            <tr>
                <th>Matchday</th>
                <?php foreach($fixtures as $f){ echo "<td>". $f['matchdayName'] ."</td>";}?>
            </tr>
            <tr>
                <th>Home Team</th>
                <?php foreach($fixtures as $f){ echo "<td>". $f['Home'] ."</td>";}?>
            </tr>
            <tr>
                <th>Away Team</th>
                <?php foreach($fixtures as $f){ echo "<td>". $f['Guest'] ."</td>";}?>
            </tr>

            <?php

        }







}