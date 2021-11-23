<?php

include_once("db.class.php");


class Team
{

    function showAllTeams(){ //show all teams and assign the sportsID as ID
        $db=new db();
        $teams= $db->getAll("Team");

        foreach ($teams as $t){

           echo "<option id='".$t["_sportsID"]."'>". $t["teamName"]."</option>";
        }

    }


}