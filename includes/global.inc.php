<?php
//global.inc.php

//start the session
session_name("soccerpage");
session_start();

require_once 'class/User.class.php';
require_once 'class/UserTools.class.php';
require_once 'class/DB.class.php';
require_once 'includes/navbar.php';
require_once 'class/Players.class.php';


//connect to the database
$db = new DB();
$db->connect();

//initialize UserTools object
$userTools = new UserTools();

//refresh session variables if logged in
if(isset($_SESSION['logged_in'])) {
$user = unserialize($_SESSION['user']);
$_SESSION['user'] = serialize($userTools->get(3));
}
?>