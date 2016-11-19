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
                                    <form method='post' action='view/updatetask.php'><button class='btn waves-effect waves-light orange' name='upd' value='$row[0]'>Edit</button></form><br/>
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
                                        <td><span id='start$row[0]start$row[0]'>$row[3]<span/></td>
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
                // obtain values from timer 1
                var id = x.value;
                var timer = $("#"+id).text();
                var hr = parseInt(timer.split(':')[0]);
                var min = parseInt(timer.split(':')[1]);
                var sec = parseInt(timer.split(':')[2]);
                // obtain values for time 2
                var timer2 = $("#"+id+id).text();
                var hr2 = parseInt(timer2.split(':')[0]);
                var min2 = parseInt(timer2.split(':')[1]);
                var sec2 = parseInt(timer2.split(':')[2]);
                // alert("hr: " + hr + "min: " + min + "sec: " + sec);
                var tmer = setInterval(function(){
                    // this sets the time for the count down
                    if (sec != 0) sec -= 1;
                    if (sec == 0 && min != 0) min -= 1;
                    if (sec == 0 && min == 0 && sec != 0) sec -= 1;
                    $("#"+id).text(hr+":"+min+":"+sec);
                    // this adds the time for the total time
                    sec2 += 1;
                    if (sec2 == 60) { sec2 = 00; min2 +=1; }
                    if (sec2 == 0 && min2 == 0) { min2 = 00; hr +=1; }
                    $("#"+id+id).text(hr2+":"+min2+":"+sec2);
                    // when timer 1 reaches 0, stop the timer and exit
                    if (hr == min == sec == 0) {
                        alert("Time Out");
                        clearInterval(tmer);
                    }
                    
 
                }, 1000);
                
            }
            
        </script>


    </body>

</html>