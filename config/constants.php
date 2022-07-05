<?php 

session_start();

define("servername" , 'localhost');
define("username" , 'root');
define("password" , '');
define("dbname" , 'news_website');

$conn = mysqli_connect( servername , username , password ,  dbname);
if(mysqli_connect_error()){
    echo "Connection Error " ; 
}
?>
