<?php
require('../admin/db_connect.php');

$rows = mysqli_query($conn, "SELECT p.*, (select team_name from team t where t.team_id = p.team_id) as team_name FROM data_mapping dm join player p on dm.player_id = p.id ");

while ($row = mysqli_fetch_array($rows)) {
    $team_name = $row['team_name'];
    $player_id = $row['id'];
}

if(isset($player_id)){
    if (file_exists('../assets/players/' . $player_id  . '.png')) {
        $img_url = '../assets/players/' . $player_id  . '.png';
    } else {
        $img_url =  '../assets/players/common.jpeg';
    }
    
    $logo_url = '../assets/logos/' . $team_name . '.png';
}
?>

<head>
    <meta charset="utf-8" />
    <title>player list</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="style.css" rel="stylesheet" type="text/css" />

</head>

<?php
$rows = mysqli_query($conn, "SELECT p.*, (select team_name from team t where t.team_id = p.team_id) as team_name FROM data_mapping dm join player p on dm.player_id = p.id ");

while ($row = mysqli_fetch_array($rows)) { ?>
    <div>
        <div class="w-layout-grid grid-3">
            <div id="w-node-_17510712-2868-0c70-dd25-817b5eaeefb8-5f2613bc" class="playing-detail">
                <h1 id="w-node-_466d8ef2-182b-7842-599d-8a321b3a30b2-5f2613bc" class="player-role"><?php
                                                                                                    // find the role of the player
                                                                                                    $role_id = $row['pro_id'];
                                                                                                    $role = mysqli_query($conn, "SELECT * FROM player_role where pro_id = '$role_id'");
                                                                                                    while ($role_row = mysqli_fetch_array($role)) {
                                                                                                        echo $role_row['player_role'];
                                                                                                    }
                                                                                                    ?></h1>
                <?php
                if ($row['pro_id'] == 2) {
                ?>
                    <p class="paragraph">
                        <b>Batting Hand: </b>
                        <!-- if bth_id == 1 then right hand batsmen else left hand-->
                        <?php $bth = $conn->query("SELECT HAND FROM batting_hand where bth_id = '$row[bth_id]'")->fetch_array()[0];
                        echo $bth; ?>
                    </p>
                    <p class="paragraph">
                        <b>Bowling Style: </b>
                        <?php
                        $bs = $conn->query("SELECT bowling_style FROM bowling_style where bs_id = '$row[bs_id]'")->fetch_array()[0];
                        echo $bs;
                        ?>
                    </p>
                <?php
                } else if ($row['pro_id'] == 1) {
                ?>
                    <p class="paragraph">
                        <b>Batting Hand: </b>
                        <?php
                        $bth = $conn->query("SELECT HAND FROM batting_hand where bth_id = '$row[bth_id]'")->fetch_array()[0];
                        echo $bth;
                        ?>
                    </p>
                <?php
                } else if ($row['pro_id'] == 3) {
                ?>
                    <p class="paragraph">
                        <b>Bowling Style: </b>
                        <?php
                        $bs = $conn->query("SELECT bowling_style FROM bowling_style where bs_id = '$row[bs_id]'")->fetch_array()[0];
                        echo $bs;
                        ?>
                    </p>
                <?php
                }

                ?>
            </div>
            <div id="w-node-b1c528fa-9596-6263-f7ec-660c11fa8c47-5f2613bc" class="bid-details">
                <h1 id="w-node-_6c39d73f-93ba-8a39-3552-405af32347ef-5f2613bc" class="bids">Bid Points:
                    <?php
                    $bid = mysqli_query($conn, "SELECT * FROM bids where player_id = '$player_id'");
                    if (mysqli_num_rows($bid) > 0) {
                        while ($bid_row = mysqli_fetch_array($bid)) {
                            echo $bid_row['bid_price'] . " Points";
                        }
                    } else {
                        echo '';
                    }
                    ?>
                </h1>
            </div>
            <?php
            $player_id = $row['id'];
            $bid = mysqli_query($conn, "SELECT * FROM bids where player_id = '$player_id'");
            if (mysqli_num_rows($bid) > 0) {
                while ($bid_row = mysqli_fetch_array($bid)) {
            ?>
                    <div id="w-node-_33ac5d46-db85-7f03-a71d-e28bc31aaaf3-5f2613bc" class="player-status sold">
                        <h1 id="w-node-_6d09ebab-5451-2c65-96ce-5664b2477a5e-5f2613bc" class="status">SOLD</h1>
                    </div>
                <?php
                }
            } else {
                ?>
                <div id="w-node-_33ac5d46-db85-7f03-a71d-e28bc31aaaf3-5f2613bc" class="player-status unsold">
                    <h1 id="w-node-_6d09ebab-5451-2c65-96ce-5664b2477a5e-5f2613bc" class="status">UNSOLD</h1>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="w-layout-grid grid-4">
        <div id="w-node-e3e85af1-b675-38da-4913-a03098130958-5f2613bc" class="player-profile">
            <img src="<?php echo $img_url; ?>" loading="lazy" height="" width="588" sizes="(max-width: 479px) 100vw, (max-width: 991px) 60vw, 588px" alt="" class="player-image" />
            <div class="player-detail">
                <h1 class="player-name"><?php echo $row['player_name'] ?></h1>
                <h3 class="semester">Semester-<?php echo $row['semester'] ?></h3>
            </div>
        </div>
        <div id="w-node-_524f0789-9744-6172-ca31-0d6edfcf7957-5f2613bc" class="other-info">
            <div class="columns w-row">
                <div class="w-col w-col-6">
                    <h1 class="base-points">Base Points: <?php echo $row['base_price'] ?></h1>

                    <hr>
                    <!-- if pro_id ==2 show all  -->
                    <?php
                    if ($row['pro_id'] == 2) {
                    ?>
                        <h3 class="player-stats">Total Inning: <?php echo $row['inning'] == null ? 0 : $row['inning'] ?></h3>
                        <h3 class="player-stats">Average: <?php echo $row['average'] == null ? 0 : $row['average'] ?></h3>
                        <h3 class="player-stats">Strike Rate: <?php echo $row['strike_rate'] == null ? 0 : $row['strike_rate'] ?></h3>
                        <h3 class="player-stats">Wicket: <?php echo $row['total_wicket'] == null ? 0 : $row['total_wicket'] ?></h3>
                    <?php
                    } else if ($row['pro_id'] == 1) {
                    ?>
                        <h3 class="player-stats">Total Inning: <?php echo $row['inning'] == null ? 0 : $row['inning'] ?></h3>
                        <h3 class="player-stats">Average: <?php echo $row['average'] == null ? 0 : $row['average'] ?></h3>
                        <h3 class="player-stats">Strike Rate: <?php echo $row['strike_rate'] == null ? 0 : $row['strike_rate'] ?></h3>
                    <?php
                    } else if ($row['pro_id'] == 3) {
                    ?>
                        <h3 class="player-stats">Wicket: <?php echo $row['total_wicket'] == null ? 0 : $row['total_wicket'] ?></h3>
                    <?php } ?>
                </div>
                <?php if (!empty($team_name) & isset($team_name)) { ?>
                    <div class="team-info w-col w-col-6">
                        <img src="<?php echo $logo_url; ?>" loading="lazy" width="698" sizes="(max-width: 479px) 100vw, (max-width: 767px) 62vw, (max-width: 991px) 37vw, 40vw" alt="" class="team-logo" />
                    </div>
                <?php } ?>
            </div>

            <div>
                <div class="w-layout-grid grid-5">
                    <div id="w-node-d7855c37-6a4f-0498-4f33-0d373c191001-5f2613bc" class="sponsors">
                        <img src="cpl-white.png" loading="lazy" sizes="(max-width: 479px) 100vw, 22vw" alt="" class="cpl-logo" />
                        <img src="vibranium.png" loading="lazy" id="w-node-_3214d3b7-fabd-0ea2-276c-e7fe9dbc7621-5f2613bc" sizes="(max-width: 479px) 100vw, 259.140625px" alt="" class="vib-logo" />
                    </div>
                </div>
            </div>

        </div>
    </div>


<?php } ?>

<script src="jquery.js" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="index.js" type="text/javascript"></script>