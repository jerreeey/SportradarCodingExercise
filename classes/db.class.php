<?php

class db
{

    private $db;
    function __construct(){ //create database connection

        try {

            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);

        }catch(PDOException $e){
            echo "Verbindung fehlgeschlagen";
            die();
        }

    }


    public function getAll($tabelle){ //get all from 1 table

        $stmt= $this->db->prepare("SELECT * FROM $tabelle");
        $stmt ->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllGames(){//get all games with the associated sport ordered by date

        $stmt= $this->db->prepare("SELECT Team.teamName as Home, t2.teamName as Guest, `startTime`, `competitionName`, `matchdayName`, `sportsName` FROM `Game`  INNER JOIN `Competition` on `_competitionID`= Competition.competitionID  INNER JOIN `Team`  on `_home`=Team.teamID INNER JOIN `Team` as t2 on `_away`= t2.teamID  INNER JOIN Matchday ON Matchday.matchdayID=`_matchdayID` INNER JOIN Sports on Competition._sportsID=Sports.sportsID order by `startTime`");
        $stmt ->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;


    }

    public  function saveGame($homeTeam,$awayTeam,$time,$competition, $matchday){ //save new created game

           $stmt=$this->db->prepare("INSERT INTO `Game` (`_home`,`_away`, `startTime`, `_competitionID`, `_matchdayID`) SELECT  Team.teamID as Home,t2.teamID as Guest, :time as Start, Competition.competitionID as Competition, Matchday.matchdayID as Matchday FROM Team as t2, Team, Competition, Matchday WHERE  Team.teamName=:home AND t2.teamName=:away AND Competition.competitionName=:competition AND Matchday.matchdayName=:matchday");
           $stmt->bindValue(":home",$homeTeam);
           $stmt->bindValue(":away",$awayTeam);
           $stmt->bindValue(":time",$time);
           $stmt->bindValue(":competition",$competition);
           $stmt->bindValue(":matchday",$matchday);

           $stmt->execute();
    }




}