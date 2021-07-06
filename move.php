<?php
# esatblish connection to database
$conn = mysqli_connect('localhost', 'root', '', 'robot_base');
# check if there is any error while connecting, if so a message with errno will appear to the user
if(mysqli_connect_errno()){ 
    die('Connection Failed : '.mysqli_connect_errno());
}else {
    # check if user pressed button with name 'forward'
    # if so assign the qurey needed to $Query variable with 
    # update on table 'base' and change entity 'Direction' value to 'F' 
    # and so on for other buttons
    if(isset($_POST['forward'])){
        $Query = "INSERT INTO BASE VALUES ('F') ";
        $direction = "FORWARD";
    }
    elseif (isset($_POST['backward'])){
        $Query = "INSERT INTO BASE VALUES ('B') ";
        $direction = "BACKWARD";
    }
    elseif (isset($_POST['left'])){
        $Query = "INSERT INTO BASE VALUES ('L') ";
        $direction = "LEFT";
    }
    elseif (isset($_POST['stop'])){
        $Query = "INSERT INTO BASE VALUES ('S') ";
        $direction = "Stop";
    }
    elseif (isset($_POST['right'])){
        $Query = "INSERT INTO BASE VALUES ('R') ";
        $direction = "RIGHT";
    }
    # apply the qurey saved in variable $Query
    $result = mysqli_query($conn, $Query);
    # print appropriate message to user depend on which button user pressed 
        echo "Robot base is ";
        if($direction != "Stop"){
            echo " moving to $direction";
        }else {
            echo "not moving ";
        }
}

?>