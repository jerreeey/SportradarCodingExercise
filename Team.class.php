<?php
include ("config.inc.php");
include_once ("db.class.php");


class Team
{

    function showAllTeams(){
        $db=new db();
        $teams= $db->getAll("Team");

        foreach ($teams as $t){

           echo "<option>". $t["teamName"]."</option>";
        }

    }


}