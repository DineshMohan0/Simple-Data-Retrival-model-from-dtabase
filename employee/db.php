<?php
$servername="localhost";
$username="root";
$password="";
$databasename="login";
$conn=new mysqli($servername,$username,$password,$databasename);

if($conn->connect_error)
{
    echo "Connection Faild";
}
else{
  //  echo "Success";
}
?>