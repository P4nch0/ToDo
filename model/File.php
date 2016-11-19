<?php
    include('../controller/connection.php');

        $myfile = fopen("tasks.txt", "w") or die("Unable to open file!");

# THIS QUERY OBTAINS ALL THE TASKS IN THE DATABASES
        $sql = 'SELECT * FROM tasks ORDER BY  status ASC, priority ASC;';
        $result = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($result)) {
            # while the result from the query has data, 
            if ($row[4] === "1") $row[4] = "High";
            elseif ($row[4] === "2") $row[4] = "Medium";
            elseif ($row[4] === "3") $row[4] = "Low";

            if ($row[5] == 1) $done = "Task Completed";
            elseif ($row[5] == 0) $done = "Task Not Completed";

            fwrite($myfile, "
            TASK $row[0] ----------------------
                Description:  $row[1]
                Timer 1: $row[1]
                Timer 2: $row[3]
                Priority: $row[4]
                Status: $row[5]");

        }
    # the file is closed
        fclose($myfile);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename('tasks.txt'));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('tasks.txt'));
    readfile('tasks.txt');
    exit;


        echo "<script>alert('FILE CREATED!'); location.href='../index.php';</script>";
    
?>