<?php

include_once("Fixture.class.php");
$fixtures = new Fixture();
if($_POST['Time'] ){ //If Post request included DateTime of event save the Fixture

    $fixtures->addFixture($_POST['Home'],$_POST['Guest'],$_POST['Time'],$_POST['Competition'],$_POST['Matchday']);

}