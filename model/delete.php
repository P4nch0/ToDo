<?php

    include('../controller/connection.php');
#this function is called by the button, receives the id and then proceeds to delete the task
    $id = $_POST['del'];
    
    $sql = "DELETE FROM tasks
            WHERE idtask='$id';";

    $try = mysqli_query($db,$sql);
#on failure the user most know
    if($try === true) echo "<script>alert('DELETED!'); location.href='../index.php';</script>";
    else echo "<script>alert('ERROR!'); location.href='../index.php';</script>";
    
?>