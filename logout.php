<?php 
session_start();
require_once "autoload.php"; 

$user = new Usuario();

$user->logout();