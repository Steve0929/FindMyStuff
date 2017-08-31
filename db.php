<?php
/* Database connection settings */
$host = 'localhost';
$user = 'id2356929_steve';
$pass = 'lalala';
$db = 'id2356929_accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);