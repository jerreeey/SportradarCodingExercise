<?php
include("./config.inc.php");
include_once("db.class.php");


class Matchday
{

    function showAllMatchdays(){ //show all matchdays
        $db=new db();
        $teams= $db->getAll("Matchday");

        foreach ($teams as $t){

            echo "<option>". $t["matchdayName"]."</option>";
        }

    }

}