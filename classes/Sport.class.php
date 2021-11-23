<?php

include_once("db.class.php");


class Sport
{
    function showAllSports(){//show all sports and assign the sportsID as ID
        $db=new db();
        $sports= $db->getAll("Sports");

        foreach ($sports as $s){

            echo "<option id='". $s['sportsID']."'>". $s["sportsName"]."</option>";
        }

    }
}