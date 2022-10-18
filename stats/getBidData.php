<?php require_once 'db_connect.php'; ?>


    <?php
    $players = $conn->query("SELECT p.*, (SELECT team_name from team t where t.team_id = p.team_id) as team_name FROM player p join bids b on b.player_id = p.id order by p.id asc");
    while ($row = $players->fetch_assoc()) :
    ?>

        <tr data-id='<?php echo $row['id'] ?>'>
            <td class="text-center"><?php echo $row['id'] ?></td>
            <td class="">
                <div class="row justify-content-center">
                    <img height="50" src="../assets/players/<?php 
													// check if file is available on name of id
													if(file_exists('../assets/players/'.$row['id'].'.png')){
														echo $row['id'].'.png';
													}else{
														echo 'common.jpeg';
													}
												?>" alt="">
                </div>
            </td>
            <td>
                <p> <b><?php echo $row['team_name'] ?></b></p>
            </td>
            <td class="">
                <p>Name: <b><?php echo ucwords($row['player_name']) ?></b></p>
                <p><small>Role: <b><?php

                                    // select from table	
                                    if ($row['pro_id'] == "") {
                                        echo "N/A";
                                    } else {
                                        $role_id = $row['pro_id'];
                                        $roles = $conn->query("SELECT * FROM player_role where pro_id = '$role_id'");
                                        $role = $roles->fetch_assoc();
                                        echo $role['player_role'];
                                    }


                                    ?></b></small></p>
                <?php if ($row['bs_id'] != NULL) {
                ?>
                    <p><small>Bowling Style: <b><?php
                                                $bs = $conn->query("SELECT * FROM bowling_style where bs_id = " . $row['bs_id']);
                                                $bs = $bs->fetch_assoc();
                                                echo $bs['bowling_style'] ?></b></small></p>
                <?php
                } ?>
                <?php if ($row['bth_id'] != NULL) {
                ?>
                    <p><small>Batting Hand: <b>
                                <?php echo $row['bth_id'] == 1 ? 'Right Hand Batsman' : 'Left Hand Batsman' ?></b></small></p>
                <?php
                } ?>

            </td>
            <td>
                <p><small>Base Price: <b><?php echo number_format($row['base_price'], 2) ?></b></small></p>
                <p><small>Highest Bid: <b class="highest_bid"><?php
                                                                // get bid from bid table
                                                                $bid = $conn->query("SELECT * FROM bids where player_id = '" . $row['id'] . "'");
                                                                $bids = $bid->fetch_assoc();
                                                                echo mysqli_num_rows($bid) > 0 ? $bids['bid_price'] : 0;
                                                                ?>

            </td>
        </tr>
    <?php endwhile; ?>
