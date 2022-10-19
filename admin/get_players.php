<?php

require('db_connect.php');
require('functions.php');

if ($_POST['data'] == "edit") {

    $player_id = get_safe_value($conn, $_POST['player_id']);
    $result = mysqli_query($conn, "SELECT p.pro_id, (SELECT player_role from player_role pr where pr.pro_id = p.pro_id) as player_role, p.id, p.player_name, p.base_price, (SELECT bid_price from bids b where b.player_id = p.id) as bid_price, p.team_id from player p where p.id = '$player_id'");


    // $result = mysqli_query($conn, "Select  p.id , p.player_name , p.base_price , b.bid_price , t.team_id from player_role pro join player p on p.pro_id = pro.pro_Id , bids b join team t on b.team_id = t.team_id where p.id = '$player_id' ;");

    while ($row = $result->fetch_assoc()) {

        foreach ($row as $value) {

            echo ($value . ";");
        }
    }
}

if ($_POST['data'] == "delete") {

    $bid_id = get_safe_value($conn, $_POST['bid_id']);
    $res = mysqli_query($conn, "UPDATE player set team_id = NULL where id = (SELECT player_id from bids where id = $bid_id)");
    $result = mysqli_query($conn, "delete from bids where id = $bid_id");
}

if ($_POST['data'] == "edit_team") {

    $team_id = get_safe_value($conn, $_POST['team_id']);
    $result = mysqli_query($conn, "select * from team where team_id = $team_id");

    while ($row = $result->fetch_assoc()) {

        foreach ($row as $value) {

            echo ($value . ";");
        }
    }
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

    $res = mysqli_query($conn, "select * from bids where player_id = '$pid'");


    if (mysqli_num_rows($res) > 0) {

        $result = mysqli_query($conn, "UPDATE bids set team_id = '$tid', base_price = '$bprice', bid_price = '$bidp' where player_id = '$pid'");
        $res = mysqli_query($conn, "UPDATE player set team_id = '$tid' where id = '$pid'");
    } else {

        $result = mysqli_query($conn, "INSERT INTO bids ( player_id, team_id, base_price, bid_price) VALUES ( '$pid', '$tid', '$bprice', '$bidp')");
        $res = mysqli_query($conn, "UPDATE player set team_id = '$tid' where id = '$pid'");

        $result = mysqli_query($conn, "SELECT b.id , p.player_name , t.team_name , b.base_price , b.bid_price FROM bids b join player p on b.player_id = p.id join team t on b.team_id = t.team_id order by p.player_name asc");

        while ($row = $result->fetch_assoc()) {

            foreach ($row as $value) {

                echo ($value . ";");
            }
        }
    }
}

if ($_POST['data'] == "player") {


    $player_id = get_safe_value($conn, $_POST['player_id']);
    $result = mysqli_query($conn, "select base_price from player where id = '$player_id' ");

    // echo "Player id in gep " . $player_id;

    while ($row = $result->fetch_assoc()) {

        foreach ($row as $value) {

            echo ($value);
        }
    }

    updateMainScreen($conn, $player_id);
}
if ($_POST['data'] == "add_team_user") {
    // fetch team_name, username, password
    $team_name = get_safe_value($conn, $_POST['team_name']);
    $username = get_safe_value($conn, $_POST['username']);
    $password = get_safe_value($conn, $_POST['password']);

    // find team_id from team_name
    $result = mysqli_query($conn, "select team_id from team where team_name = '$team_name' ");
    $row = $result->fetch_assoc();
    $team_id = $row['team_id'];

    // check if username already exists
    $result = mysqli_query($conn, "select * from team_login where team_id =  " . $team_id . " ");

    $pass = md5($password);
    if (mysqli_num_rows($result) > 0) {
        echo 2;
    } else {
        // insert into user table
        $result = mysqli_query($conn, "INSERT INTO team_login ( username, password, team_id) VALUES ( '$username', '$pass', '$team_id')");
        echo 1;
    }
}

function updateMainScreen($conn, $player_id)
{


    $r = mysqli_query($conn, "SELECT * FROM data_mapping WHERE id=1");

    $res = mysqli_num_rows($r);

    if ($res > 0) {
        $result = mysqli_query($conn, "UPDATE data_mapping SET player_id ='$player_id' WHERE id=1");
    } else {
        $res = mysqli_query($conn, "insert into data_mapping values (1, '$player_id')");
    }
}
