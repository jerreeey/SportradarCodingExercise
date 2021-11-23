<?php

include_once("db.class.php");

class Fixture
{

    public function showFixtures(){//show all Fixtures as tablecells
        $db= new db();
        $fixtures= $db->getAllGames();

             foreach($fixtures as $f){

                 $new_date = date('D., d.m.Y, H:i', strtotime($f['startTime'])); //assign correct date format
                 echo "<tr><td>". $new_date ."</td>". "<td>". $f['sportsName'] ."</td>"."<td>". $f['competitionName'] ."</td>"."<td>". $f['matchdayName'] ."</td>"."<td>". $f['Home'] ."</td>"."<td>". $f['Guest'] ."</td>"."</tr>";}
        }

     public function addFixture($home,$away,$time,$competition, $matchday){//save new created game
         $db= new db();
         $db->saveGame($home,$away,$time,$competition, $matchday);

     }


}