<?php

    session_start();

    require_once("config.php");

    $user_id = $_SESSION["USER_ID"];

    $query="SELECT fridge_name, Fridges.fridge_id, creator FROM Fridges JOIN Auth_Users ON Fridges.fridge_id = Auth_Users.fridge_id
            WHERE authorized = 'Yes' && user_id = '".$user_id."'";

    $response = @mysqli_query($dbc, $query);

    while($row = mysqli_fetch_array($response)) {
        echo $row['fridge_name'];

        if($row['creator'] == 'Yes') {
            echo " ".'<a href="deleteFridge.php?fridge_id='.$row['fridge_id'].'">Delete</a>';
        }

        echo " ".'<a href="leaveFridge.php?fridge_id='.$row['fridge_id'].'">Leave</a>';
        echo '<br><hr>';

        $query2 = "SELECT name, creator, Users.user_id FROM Users JOIN Auth_Users ON Users.user_id = Auth_Users.user_id 
                   WHERE authorized = 'Yes' && fridge_id = ".$row['fridge_id'];
        $response2 = @mysqli_query($dbc, $query2);

        while($row2 = mysqli_fetch_array($response2)) {
            echo $row2['name'];

            if($row['creator'] == 'Yes' && $row2['user_id'] != $user_id) {
                echo " ".'<a href="deleteUser.php?user_id='.$row2['user_id'].'&fridge_id='.$row['fridge_id'].'">Delete</a>';
                echo " ".'<a href="promoteUser.php?user_id='.$row2['user_id'].'&fridge_id='.$row['fridge_id'].'">Pass Privilages</a>';
            }

            echo '<br>';
        }

        echo '<br><form action="addUsers.php?fridge_id='.$row['fridge_id'].'" method="post">
                    <label for="email">
                            Username
                            <input type="text" name="email" id="email">
                            <input type="submit" value="Add">
                    </label>
              </form><br><br>       ';
    }

    mysqli_close($dbc);

?>