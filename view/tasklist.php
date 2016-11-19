<!DOCTYPE html>
<html>

    <?php
        include('view/head.php');
        include('controller/connection.php');
    ?>

    <body class="valign-wrapper">

        <div class="row">
            <div class="card-panel blue-grey">
                <div class="card-content white-text">
                    
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn orange darken-3" href="view/new.php">New Task</a><br/><br/><br/>
                    <form method='post' action='model/File.php'><button class='btn waves-effect waves-light' name='fin'>Print file</button></form><br/>

                    <table class="bordered">
                        <thead>
                          <tr>
                              <th>Task #</th>
                              <th>Description</th>
                              <th>Timer</th>
                              <th>Total Time</th>
                              <th>Priority</th>
                              <th>Actions</th>
                          </tr>
                        </thead>

                        <tbody>

                            <?php
                                # THIS QUERY OBTAINS ALL THE TASKS IN THE DATABASES
                                $sql = 'SELECT * FROM tasks ORDER BY  status ASC, priority ASC;';
                                $result = mysqli_query($db,$sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    # while the result from the query has data, a table row with the information of each task is printed 
                                    if ($row[4] === "1") $row[4] = "High";
                                    elseif ($row[4] === "2") $row[4] = "Medium";
                                    elseif ($row[4] === "3") $row[4] = "Low";
                                    
                                    if ($row[5] == 1) { $done = "<td>Task Completed
                                                                <form method='post' action='model/delete.php'>
                                                                    <button type='submit' class='btn waves-effect waves-light red darken-2' name='del' value='$row[0]'>Delete
                                                                    </button></form>";
                                                       $tim = "<td>--:--:--</td>";
                                                      }
                                    elseif ($row[5] == 0) { $done = "<td>
                                    <form method='post' action=''><button class='btn waves-effect waves-light orange' value='finish'>Edit</button></form><br/>
                                    <form method='post' action='model/finish.php'><button class='btn waves-effect waves-light orange lighten-2' name='fin' value='$row[0]'>Finish</button></form><br/>
                                    <form method='post' action='model/delete.php'><button type='submit' class='btn waves-effect waves-light red darken-2' name='del' value='$row[0]'>Delete</button></form>
                                    </td>";
                                                      $tim = "<td>  <span id='start$row[0]'>$row[2]</span> <button onclick='startTimer(this)' value ='start$row[0]' class='btn-floating waves-effect waves-light blue'>Go</button></td>";   
                                                          }
                                    
                                    print_r("
                                    <tr class='hoverable'>
                                        <td>$row[0]</td>
                                        <td>$row[1]</td>
                                        $tim
                                        <td>$row[3]</td>
                                        <td>$row[4]</td>
                                        $done
                                </tr>");
                                    
                                }
                            ?>
                          </tr>
                        </tbody>
                      </table>

                </div>
            </div>
        </div>

        <script>
            // the button triggers the timer function, it obtains the actual value and begins the count down
            function startTimer (x) {
                var id = x.value;
                var timer = $("#"+id).text();
                
                alert(timer);
                
            }
            
        </script>


    </body>

</html>