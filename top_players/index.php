<?php
require('../admin/db_connect.php');
?>

<!DOCTYPE html><!-- This site was created in Webflow. https://www.webflow.com -->
<!-- Last Published: Mon Oct 17 2022 16:41:30 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="player-list.webflow.io" data-wf-page="634d821d7295ed5a5f2613bc"
    data-wf-site="634d821d7295ed6fa82613bb">

<head>
    <meta charset="utf-8" />
    <title>player list</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="style.css"
        rel="stylesheet" type="text/css" />
</head>

<body class="body">
    <div>
        <div class="w-layout-grid grid">
            <h1 id="w-node-a27b495e-df82-3c69-4af8-587336b49b53-5f2613bc" class="heading">TOP 10 BIDS</h1>
        </div>
    </div>
    <div>
        <?php
        $sql = "SELECT p.player_name, t.team_name, pr.player_role, bd.bid_price FROM player p join team t on p.team_id = t.team_id join player_role pr on p.pro_id = pr.pro_id join bids bd on p.id = bd.player_id ORDER BY bd.bid_price DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="w-layout-grid grid-2">
            <h3 id="w-node-eb2a117d-2b19-ef4d-cdc9-d72986e91f53-5f2613bc" class="player-detail"><?php echo $row['team_name'] ?></h3>
            <h3 id="w-node-bf6cc359-1f0c-aa2c-d191-f32c3d86a92d-5f2613bc" class="player-detail"><?php echo $row['player_name'] ?></h3>
            <h3 id="w-node-_461ba603-20f5-74a7-8e3b-f27fe787bc12-5f2613bc" class="player-detail"><?php echo $row['player_role'] ?></h3>
            <h3 id="w-node-_275cb316-df50-b676-c8db-46118980c7d8-5f2613bc" class="player-detail"><?php echo $row['bid_price'] ?></h3>
        </div>
        
        <?php
            }
        }
        ?>
    </div>
    <script src="jquery-3.5.1.min.dc5e7f18c8.js"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="index.js"
        type="text/javascript"></script>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>

</html>