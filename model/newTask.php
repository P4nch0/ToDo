<?php

# INSERT INTO `tasks` (`idtask`, `description`, `timer1`, `timer2`, `priority`, `status`) VALUES (NULL, 'Investigate design patterns', '00:30:00', '00:00:00', '2', '0');

    include('../controller/connection.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        //define variables with POST values
        $desc = htmlspecialchars($_POST["desc"]);
        $timer1 = htmlspecialchars($_POST["timer1"]);
        $timer2 = htmlspecialchars($_POST["timer2"]);
        $prior = htmlspecialchars($_POST["prior"]);

#after receiving the data, the new task is created
        $sql = "INSERT INTO `tasks` (`idtask`, `description`, `timer1`, `timer2`, `priority`, `status`) 
                VALUES ( NULL, '$desc',  '$timer1', '$timer2', '$prior', '0')";

        $try = mysqli_query($db,$sql);
#on failure it is redirected to the index
        if($try === true) echo "<script>alert('Success!'); location.href='../index.php';</script>";
        else echo "<script>alert('ERROR!'); location.href='../index.php';</script>";

    }

?>