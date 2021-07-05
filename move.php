<?php

$conn = mysqli_connect('localhost', 'root', '', 'robot_base');
if(mysqli_connect_errno()){
    die('Connection Failed : '.mysqli_connect_errno());
}else {
    if(isset($_POST['forward'])){
        $Query = "UPDATE base SET Direction = 'F' ";
        $direction = "FORWARD";
    }
    elseif (isset($_POST['backward'])){
        $Query = "UPDATE base SET Direction = 'B' ";
        $direction = "BACKWARD";
    }
    elseif (isset($_POST['left'])){
        $Query = "UPDATE base SET Direction = 'L' ";
        $direction = "LEFT";
    }
    elseif (isset($_POST['stop'])){
        $Query = "UPDATE base SET Direction = 'S' ";
        $direction = "Stop";
    }
    elseif (isset($_POST['right'])){
        $Query = "UPDATE base SET Direction = 'R' ";
        $direction = "RIGHT";
    }
    $result = mysqli_query($conn, $Query);
        echo "Robot base is ";
        if($direction != "Stop"){
            echo " moving to $direction";
        }else {
            echo "not moving ";
        }
}

?>