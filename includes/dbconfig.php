<?php

$dbhostname="localhost";
$dbusername="id10953717_admin";
$dbpassword="abhi1234";
$dbname="id10953717_voterdb";
$dberror="";
$error=false;
$con = mysqli_connect($dbhostname,$dbusername,$dbpassword,$dbname);
if(!$con){
  $dberror="<span class='red'>&#9888;</span>There is a problem with the database, please try again later";
  $error=true;
}

?>