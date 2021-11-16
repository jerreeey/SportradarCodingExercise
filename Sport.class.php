<?php
include ("config.inc.php");
include_once ("db.class.php");


class Sport
{
    function showAllSports(){
        $db=new db();
        $sports= $db->getAll("Sports");

        foreach ($sports as $s){

            echo "<option id='". $s['sportsID']."'>". $s["sportsName"]."</option>";
        }

    }
}