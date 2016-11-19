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
                    <a class="waves-effect waves-light btn orange darken-3" href="view/new.php">New Task</a>

                    <table>
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
                                $sql = 'SELECT * FROM tasks ORDER BY  status ASC, priority ASC;';
                                $result = mysqli_query($db,$sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    # THIS QUERY OBTAINS ALL THE TASKS IN THE DATABASES AND FILLS THE TABLE WITH THEM
                                    if ($row[4] === "1") $row[4] = "High";
                                    elseif ($row[4] === "2") $row[4] = "Medium";
                                    elseif ($row[4] === "3") $row[4] = "Low";
                                    
                                    if ($row[5] == 1) $done = "<td>Task Completed  <button class='btn waves-effect waves-light red darken-2'>Delete</button></td>";
                                    elseif ($row[5] == 0) $done = "<td><button class='btn waves-effect waves-light orange'>Finish</button> <button class='btn waves-effect waves-light orange lighten-2'>Edit</button> <button class='btn waves-effect waves-light red darken-2'>Delete</button></td>";
                                    
                                    print_r("
                                    <tr class='hoverable'>
                                        <td>$row[0]</td>
                                        <td>$row[1]</td>
                                        <td>$row[2] <button onclick='startTimer();' id ='start$row[0]' class='btn-floating waves-effect waves-light blue'>Go</button></td>
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
            function startTimer () {
                alert("SI");
            }
        </script>


    </body>

</html>