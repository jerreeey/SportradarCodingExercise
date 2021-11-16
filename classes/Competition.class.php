<?php
include("./config.inc.php");
include_once("db.class.php");


class Competition
{
    function showAllCompetitions(){//show all competitions and assign the sportsID as ID
        $db=new db();
        $competitions= $db->getAll("Competition");

        foreach ($competitions as $c){

            echo "<option id='".$c["_sportsID"]."'>". $c["competitionName"]."</option>";
        }

    }
}