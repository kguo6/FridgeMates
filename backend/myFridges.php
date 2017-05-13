<?php

    session_start();

    require_once("config.php");

    $user_id = $_SESSION["USER_ID"];

    $query="SELECT fridge_name, Fridges.fridge_id FROM Fridges JOIN Auth_Users ON Fridges.fridge_id = Auth_Users.fridge_id
            WHERE authorized = 'Yes' && user_id = '".$user_id."'";

    $response = @mysqli_query($dbc, $query);

    while($row = mysqli_fetch_array($response)) {
        echo $row['fridge_name']."<br><hr>";

        $query2 = "SELECT * FROM Items WHERE deleted = 'No' && fridge_id = ".$row['fridge_id'];
        $response2 = @mysqli_query($dbc, $query2);

        while($row2 = mysqli_fetch_array($response2)) {
            echo '<a href="item.php?item_id='.$row2['item_id'].'">'.$row2['item_name'].'</a>'." ".'
                  <a href="deleteItem.php?item_id='.$row2['item_id'].'">Delete</a><br>';
        }

        echo '<br><form action="addItem.php?fridge_id='.$row['fridge_id'].'" method="post">
                    <label for="item_name">
                            Item
                            <input type="text" name="item_name" id="item_name">
                            <input type="text" name="item_comment" id="item_comment">
                            <input type="submit" value="Add">
                    </label>
              </form><br><br>       ';
    }

    mysqli_close($dbc);

?>