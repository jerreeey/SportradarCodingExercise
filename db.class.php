<?php

class db
{

    private $db;
    function __construct(){

        try {

            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);

        }catch(PDOException $e){
            echo "Verbindung fehlgeschlagen";
            die();
        }

    }

    /**
     * @return PDO
     */
    public function getDb()
    {
        return $this->db;
    }

    public function getAll($tabelle){

        $stmt= $this->db->prepare("SELECT * FROM $tabelle");
        $stmt ->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllGames(){

        $stmt= $this->db->prepare("SELECT Team.teamName as Home, t2.teamName as Guest, `startTime`, `competitionName`, `matchdayName`, `sportsName` FROM `Game`  INNER JOIN `Competition` on `_competitionID`= Competition.competitionID  INNER JOIN `Team` as t2 on `_home`=t2.teamID INNER JOIN `Team` on `_away`= Team.teamID  INNER JOIN Matchday ON Matchday.matchdayID=`_matchdayID` INNER JOIN Sports on Competition._sportsID=Sports.sportsID");
        $stmt ->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;


    }

    public  function saveGame($homeTeam,$awayTeam,$time,$competition, $matchday){

           $stmt=$this->db->prepare("INSERT INTO `Game` (`_home`,`_away`, `startTime`, `_competitionID`, `_matchdayID`) SELECT  Team.teamID as Home,t2.teamID as Guest, :time as Start, Competition.competitionID as Competition, Matchday.matchdayID as Matchday FROM Team as t2, Team, Competition, Matchday WHERE  Team.teamName=:home AND t2.teamName=:away AND Competition.competitionName=:competition AND Matchday.matchdayName=:matchday");
           $stmt->bindValue(":home",$homeTeam);
           $stmt->bindValue(":away",$awayTeam);
           $stmt->bindValue(":time",$time);
           $stmt->bindValue(":competition",$competition);
           $stmt->bindValue(":matchday",$matchday);

           $stmt->execute();
    }




}