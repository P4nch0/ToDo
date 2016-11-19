<?php

    include('../controller/connection.php');
#this function is called by the button, receives the id and then proceeds update the status of the newly finished task

    $id = $_POST['fin'];
    
    $sql = "UPDATE tasks
            SET status = '1'
            WHERE idtask='$id';";

    $try = mysqli_query($db,$sql);
    #echo mysqli_error($db);

    if($try === true) echo "<script>alert('FINISHED!'); location.href='../index.php';</script>";
    else echo "<script>alert('ERROR!'); location.href='../index.php';</script>";
    
?>