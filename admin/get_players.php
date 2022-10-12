<?php

require('db_connect.php');
require('functions.php');


if ($_POST['data'] == "delete") {

    $bid_id = get_safe_value($conn, $_POST['bid_id']);
    $result = mysqli_query($conn, "delete from bids where id = $bid_id");

}

if ($_POST['data'] == "category") {

    $pro_id = get_safe_value($conn, $_POST['pro_id']);
    $result = mysqli_query($conn, "select distinct(id) , player_name from player where pro_id = '$pro_id' and id not in (select distinct(player_id) from bids) and base_price is not null ");

    while ($row = $result->fetch_assoc()) {

        foreach ($row as $value) {       

            echo ($value . ";");
        }
    }
}

if ($_POST['data'] == "save") {
    $tid =  $_POST['team_id'];
    $pid = $_POST['player_id'];
    $bprice =  $_POST['base_price'];
    $bidp =  $_POST['bid_price'];
    $result = mysqli_query($conn, "INSERT INTO bids ( player_id, team_id, base_price, bid_price) VALUES ( '$pid', '$tid', '$bprice', '$bidp')");
    $result = mysqli_query($conn, "UPDATE player set team_id = '$tid' where id = '$pid'");

    $result = mysqli_query($conn,"SELECT b.id , p.player_name , t.team_name , b.base_price , b.bid_price FROM bids b join player p on b.player_id = p.id join team t on b.team_id = t.team_id order by p.player_name asc");
    
    while ($row = $result->fetch_assoc()) {

        foreach ($row as $value) {       

            echo ($value . ";");
        }
    }
}

if ($_POST['data'] == "player") {


    $player_id = get_safe_value($conn, $_POST['player_id']);
    $result = mysqli_query($conn, "select base_price from player where id = '$player_id' ");

    while ($row = $result->fetch_assoc()) {

        foreach ($row as $value) {

            echo ($value);
        }
    }
}
