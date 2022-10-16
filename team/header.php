<meta content="" name="descriptison">
<meta content="" name="keywords">



<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="assets/font-awesome/css/all.min.css">


<!-- Vendor CSS Files -->
<link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../admin/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="../admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../admin/assets/vendor/venobox/venobox.css" rel="stylesheet">
<link href="../admin/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="../admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../admin/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="../admin/assets/DataTables/datatables.min.css" rel="stylesheet">
<link href="../admin/assets/css/jquery.datetimepicker.min.css" rel="stylesheet">
<link href="../admin/assets/css/select2.min.css" rel="stylesheet">


<!-- Template Main CSS File -->
<link href="../admin/assets/css/style.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../admin/assets/css/jquery-te-1.4.0.css">

<script src="../admin/assets/vendor/jquery/jquery.min.js"></script>
<script src="../admin/assets/DataTables/datatables.min.js"></script>
<script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../admin/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="../admin/assets/vendor/php-email-form/validate.js"></script>
<script src="../admin/assets/vendor/venobox/venobox.min.js"></script>
<script src="../admin/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="../admin/assets/vendor/counterup/counterup.min.js"></script>
<script src="../admin/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../admin/assets/js/select2.min.js"></script>
<script type="text/javascript" src="../admin/assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="../admin/assets/font-awesome/js/all.min.js"></script>
<script type="text/javascript" src="../admin/assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>



<?php

include('db_connect.php');
$team_id = $_SESSION['team_login_team_id'];
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
?>