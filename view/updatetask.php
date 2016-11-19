<!DOCTYPE html>
<html>

<head>
    

    <!-- Compiled and minified CSS -->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">-->

          
    
</head>
    
<body class="valign-wrapper">

    <div class="row">
        <div class="card-panel blue-grey">
            <div class="card-content white-text">
<!--      this form obtains the values for the new task          -->
                <form role="form" id="newtask"  action = "../model/edit.php" method = "post">
                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo $_POST['upd']; ?>">
                        <div class="input-field">
                            <label>Description</label>
                            <input  name="desc">
                        </div>
                        <div class="input-field">
                            <input  type="time" value="00:00:00" name="timer1">
                        </div>
                        <div class="input-field">
                            <input  type="time" value="00:00:00" name="timer2">
                        </div>
                        <div class="input-field">
                            <label>Priority</label>
                            <select name="prior">
                                <option value="1">High</option>
                                <option value="2">Medium</option>
                                <option value="3">Low</option>
                            </select>
                        </div>
                        
                    </fieldset>
                    <br/>
                    <input type="submit" class="btn btn-lg btn-success btn-block orange" value="UPDATE">
                </form>
            </div>
        </div>
    </div>

<!--
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    
-->
    
    </body>
</html>
