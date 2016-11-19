<?php
   #define('DB_SERVER', 'localhost');
   #define('DB_USERNAME', 'root');
   #define('DB_PASSWORD', '');
   #define('DB_DATABASE', 'todo');

   define('DB_SERVER', '50.62.209.157:3306');
   define('DB_USERNAME', 'P4NCH0');
   define('DB_PASSWORD', 'Nfr4nk64');
   define('DB_DATABASE', 'todo');

# $hostname = "50.62.209.157:3306";
# $username = "P4NCH0";
# $password = "Nfr4nk64";
# $database = "das_pancho";

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   //this creates the object db that is used all the program
?>

