<?php 
	include_once("controller/Controller.php");

	$controller = new Controller();
	$controller->invoke();
    #the index only invokes the controller which calls the main view
?>