<?php
include("config.inc.php");
include_once ("db.class.php");

class Fixture
{

    public function showFixtures(){
        $db= new db();
        $fixtures= $db->getAllGames();
             foreach($fixtures as $f){ echo "<tr><td>". $f['startTime'] ."</td>". "<td>". $f['sportsName'] ."</td>"."<td>". $f['competitionName'] ."</td>"."<td>". $f['matchdayName'] ."</td>"."<td>". $f['Home'] ."</td>"."<td>". $f['Guest'] ."</td>"."</tr>";}
        }

     public function addFixture($home,$away,$time,$competition, $matchday){
         $db= new db();
         $db->saveGame($home,$away,$time,$competition, $matchday);

     }


}