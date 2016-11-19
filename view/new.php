<!DOCTYPE html>
<html>

<head>
    
    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    
</head>
    
<body class="valign-wrapper">

    <div class="row">
        <div class="card-panel blue-grey">
            <div class="card-content white-text">
                <form role="form" id="newtask"  action = "../model/newTask.php" method = "post">
                    <fieldset>
                        <div class="input-field">
                            <input  placeholder="Description" name="desc">
                        </div>
                        <div class="input-field">
                            <input  type="time" name="timer1">
                        </div>
                        <div class="input-field">
                            <input  type="time" name="timer2">
                        </div>
                        <div class="input-field">
                            Priority:
                            <select name="prior">
                                <option value="1">High</option>
                                <option value="2">Medium</option>
                                <option value="3">Low</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-lg btn-success btn-block orange" value="CREATE">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    </body>
</html>
