<?php
include ("config.inc.php");
include_once ("db.class.php");


class Sport
{
    function showAllSports(){
        $db=new db();
        $teams= $db->getAll("Sports");

        foreach ($teams as $t){

            echo "<option>". $t["sportsName"]."</option>";
        }

    }
}