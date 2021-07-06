<?php
    # retrieve values saved by js in html from to php variables
    $base = $_POST['base'];
    $shoulder = $_POST['shoulder'];
    $elbow = $_POST['elbow'];
    $wrist = $_POST['wrist'];
    $gripper = $_POST['gripper'];
    $engin = $_POST['engin'];
    
    # create 2 arrays to hold retrieved values and name of engins in the database
    $items = array($base, $shoulder, $elbow, $wrist, $gripper, $engin);
    $name = array("base", "shoulder", "elbow", "wrist", "gripper", "engin");
    # establish a connection between php and Database
    $conn = mysqli_connect('localhost', 'root', '', 'mydb');
    if(mysqli_connect_errno()){
        die('Connection Failed : '.mysqli_connect_errno());
    }else {
        # a for loop to go through all rows of database and update each value of angle
        for($i = 0;$i <count($items); $i++){
            $Query = "UPDATE engins SET angle = '$items[$i]' WHERE name = '$name[$i]'";
            $retrieved = mysqli_query($conn, $Query);
        }

        # if user pressed run button it print/retrieve last updated values in the database 
        if(isset($_POST['run'])){
            $Query = "SELECT * FROM engins";
            $retrieved = mysqli_query($conn, $Query);
            # print all values of 6 engins' angles
            if(mysqli_num_rows($retrieved) > 0){
                echo "<table>";
                while ($data = mysqli_fetch_assoc($retrieved)){  
                    echo "<tr><td>Motor: " . strtoupper($data['name']) . "</td><td>&nbsp&nbsp&nbsp Angle: " . $data['angle'] . "</td></tr>";  
                    }
                echo "</table>";
            }
        }else {
            echo "Data has been saved";
        }
    }
?>