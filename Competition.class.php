<?php
include ("config.inc.php");
include_once ("db.class.php");


class Competition
{
    function showAllCompetitions(){
        $db=new db();
        $teams= $db->getAll("Competition");

        foreach ($teams as $t){

            echo "<option>". $t["competitionName"]."</option>";
        }

    }
}