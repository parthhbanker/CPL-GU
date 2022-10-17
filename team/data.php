<?php

require('db_connect.php');

if(isset($_SESSION['team_login_team_id'])) {
    $team_id = $_SESSION['team_login_team_id'];

}else{
    // fetch data from post request
    $team_id = $_POST['team_id'];
    
}

$players = $conn->query("SELECT * from bids where team_id = $team_id");
$player_count = $players->num_rows;

$bids = $conn->query("SELECT sum(bid_price) from bids where team_id = $team_id");

$bid_count = $bids->fetch_array()[0];

$bid_left = 50000 - $bid_count;

$player_left = 13 - $player_count;

$bid_avg = $player_count != 0 ?  $bid_count / $player_count : 0;

$bid_left_avg = $bid_left / $player_left;

// show only 2 decimal
$bid_avg = number_format((float)$bid_avg, 0, '.', '');
$bid_left_avg = number_format((float)$bid_left_avg, 0, '.', '');

$highest_bid = $conn->query("SELECT max(bid_price) from bids where team_id = $team_id")->fetch_array()[0];
$lowest_bid = $conn->query("SELECT min(bid_price) from bids where team_id = $team_id")->fetch_array()[0];

// if no bid, set to 0
$highest_bid = $highest_bid == null ? 0 : $highest_bid;
$lowest_bid = $lowest_bid == null ? 0 : $lowest_bid;

// highest bid on which player
$highest_bid_player = $conn->query("SELECT player_name from player where team_id = $team_id and id = (
    SELECT player_id from bids where team_id = $team_id and bid_price = $highest_bid limit 1
)");

$highest_bid_player = $highest_bid_player->num_rows > 0 ? $highest_bid_player->fetch_array()[0] : 0;

$lowest_bid_player = $conn->query("SELECT player_name from player where team_id = $team_id and id = (
    SELECT player_id from bids where team_id = $team_id and bid_price = $lowest_bid limit 1
)");

$lowest_bid_player = $lowest_bid_player->num_rows > 0 ? $lowest_bid_player->fetch_array()[0] : 0;


// send all data to client
if(!isset($_SESSION['team_login_team_id'])) {
    // page by post

    $page = $_POST['page'];

    if ($page == "home") {
        echo json_encode(array(
            'player_count' => $player_count,
            'bid_count' => $bid_count,
            'bid_left' => $bid_left,
            'player_left' => $player_left,
            'bid_avg' => $bid_avg,
            'bid_left_avg' => $bid_left_avg,
            'highest_bid' => $highest_bid,
            'lowest_bid' => $lowest_bid,
            'highest_bid_player' => $highest_bid_player,
            'lowest_bid_player' => $lowest_bid_player
        ));
    }
    if ($page == "bids") {
        echo json_encode(array(
            'player_count' => $player_count,
            'bid_count' => $bid_count,
            'bid_left' => $bid_left,
            'player_left' => $player_left,
            'bid_avg' => $bid_avg,
            'bid_left_avg' => $bid_left_avg,
            'highest_bid' => $highest_bid,
            'lowest_bid' => $lowest_bid,
            'highest_bid_player' => $highest_bid_player,
            'lowest_bid_player' => $lowest_bid_player
        ));
    }
}
