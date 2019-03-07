<?php
//if there is no constant defined called __CONFIG__ , do not load this file
if(!defined('__CONFIG__'))
{
    exit("you do not have a config file");
}

//Session are always turned on
if(!isset($_SESSION)){
session_start();
}

//our config is below
//allow errors
error_reporting(-1);
ini_set('display_errors','On');
define('ALLOW FOOTER',true);


//include the DB.php file
include_once "../database/classes/DB.php";
include_once"../database/classes/Filter.php";
include_once"../database/classes/User.php";
include_once"../database/classes/Page.php";

$con= DB::getConnection();
?>