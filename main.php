<?php
require('admin/db_connect.php');

$rows = mysqli_query($conn, "SELECT p.*, (select team_name from team t where t.team_id = p.team_id) as team_name FROM data_mapping dm join player p on dm.player_id = p.id ");



?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title> main Auction card</title>
<style>
    /* #player-image {
        background: url('./virat.png') center center/cover no-repeat;
        height: 23rem;
        width: 20rem;
        border-radius: 12px
    } */
    #player-image {
        background: url('./test.jpg') center center/cover no-repeat;

        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    #role_box {
        margin-top: 30px;
        padding-left: 500px;
        font-size: 90px;
        width: 580px;
        height: 150px;
    }

    body {
        /* background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), center center/cover no-repeat; */
        background: radial-gradient(rgb(199, 21, 21), rgba(30, 0, 0, 0.379));
        height: 100vh;
    }

    /* add image to image class */
    .image {
        background-size: cover;
        background-repeat: no-repeat;
        height: 40%;
        width: 25%;
        /* position */
        position: absolute;
        top: 35%;
        left: 35%;
        /* position the element at the center of the page */
        /* transform: translate(-50%, -50%); */
    }
</style>
<body style="background-image:url(s4.jpg);">
    <div class="container-fluid d-flex justify-content-center w-md-0 w-sm-50 align-item-center m-0 p-0" style="height:100vh;width:100%">
        <div class="container-fluid m-0 p-3">
            <?php while ($row = mysqli_fetch_array($rows)) { ?>
                <div class="m-0 h-100 d-flex justify-content-center">
                    <div class="row g-0 w-100">

                        <div class="col-md-4 border-0 border-primary justify-content-center align-items-center flex-column d-flex px-2 gap-3">
                            <div class="container m-0  text-white -3 text-center p-2" style="background-color:rgb(87, 17, 17);border-radius:12px">
                                <!-- <span style="font-size:30px" class="d-block fw-bold"> -->
                                <span style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:30px" class="d-block fw-bold"><?php 
                                // find the role of the player
                                $role_id = $row['pro_id'];
                                $role = mysqli_query($conn, "SELECT * FROM player_role where pro_id = '$role_id'");
                                while ($role_row = mysqli_fetch_array($role)) {
                                    echo $role_row['player_role'];
                                }
                            ?></span>
                            <?php
                            // 
                            // 
                            // need to be changed
                            // 
                            // 
                            if ($row['pro_id'] == 1) {
                                ?>
                                    <span style="font-size:20px" class="d-block">
                                        <!-- if bth_id == 1 then right hand batsmen else left hand-->
                                        <?php echo $row['bth_id'] == 1 ? 'Right Hand Batsmen' : 'Left Hand Batsmen' ?>
                                    </span>
                                    <span style="font-size:20px" class="d-block">
                                        <!-- if bth_id == 1 then right hand batsmen else left hand-->
                                        <?php // echo $row['bth_id'] == 1 ? 'Right Hand Batsmen' : 'Left Hand Batsmen' 
                                        ?>
                                        Bowler
                                    </span>
                                <?php
                                } else if ($row['pro_id'] == 3 || $row['pro_id'] == 5 || $row['pro_id'] == 6) {
                                ?>
                                    <span style="font-size:20px" class="d-block">
                                        <!-- if bth_id == 1 then right hand batsmen else left hand-->
                                        <?php echo $row['bth_id'] == 1 ? 'Right Hand Batsmen' : 'Left Hand Batsmen' ?>
                                    </span>
                                <?php
                                } else if ($row['pro_id'] == 2) {
                                    echo '<span style="font-size:20px" class="d-block">Wicket</span>';
                                } else if ($row['pro_id'] == 4) {
                                    echo '<span style="font-size:20px" class="d-block">Bowling</span>';
                                }

                                ?>
                            </div>
                            <div id="image_id" class="container d-flex flex-column justify-content-center h-100 m-0  border-warning" style="border-radius:12px;background:#534c4c">

                                <div class="h-100" id="player-image">
                                    <span class="fs-1 px-2"><?php echo $row['id'] ?></span>
                                </div>
                                <br>
                                <hr class="border border-3 w-100 m-0">
                                <div class="p-2 m-0 text-white d-flex flex-column justify-content-center align-items-center" style="border-bottom-left-radius: 12px;border-bottom-right-radius: 12px;border: 3px solid black;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                    <span class="d-block" style="font-size:40px"><?php echo $row['player_name'] ?></span>
                                    <span class="d-block" style="font-size:20px">SEMESTER-<?php echo $row['semester'] ?></span>
                                    <!-- <span class="d-block" style="font-size:25px">STATUS</span> -->
                                </div>
                                <!-- <div class="p-2 m-0 text-white d-flex flex-column justify-content-center align-items-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                    
                                    
                                </div> -->
                            </div>
                        </div>


                        <div class="col-md-8 border-0 border-success d-flex flex-column justify-content-start gap-3 px-2 my-md-0 my-3 ">
                            <div class="d-flex flex-md-row flex-column justify-content-center container-fluid m-0 gap-2">
                                <div class="m-0  text-white border-3 flex-fill text-center p-2"
                                    style="background-color:rgb(87, 17, 17);border-radius:12px">
                                    <span style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:3.9rem;font-weight: bolder;" class="d-block">BID Points : <?php
                                        $player_id = $row['id'];
                                        $bid = mysqli_query($conn, "SELECT * FROM bids where player_id = '$player_id'");
                                        if (mysqli_num_rows($bid) > 0) {
                                            while ($bid_row = mysqli_fetch_array($bid)) {
                                                echo $bid_row['bid_price']." Points";
                                            }
                                        } else {
                                            echo '';
                                        }
                                        ?></span>
                                </div>
                                <div class="m-0 text-white text-center p-2" style="margin-top:800px; border-radius:12px;font-size:2rem;background-color: #5c0505;">
                                    <!-- <span class="d-block my-auto">STATUS</span> -->
                                    <!-- check if player_is present in bid table or not -->
                                    <?php
                                    $player_id = $row['id'];
                                    $bid = mysqli_query($conn, "SELECT * FROM bids where player_id = '$player_id'");
                                    if (mysqli_num_rows($bid) > 0) {
                                        while ($bid_row = mysqli_fetch_array($bid)) {
                                            echo '<span class="d-block" style="font-size:40px">SOLD</span>';
                                        }
                                    } else {
                                        echo '<span class="d-block" style="font-size:40px">UNSOLD</span>';
                                    }
                                    ?>
                                    <!-- <span class="d-block" style="font-size:25px">STATUS</span> -->
                                </div>
                                    
                                    <!-- <div style="font-size:1.2rem;">
                                        <span style="font-size:1.6rem;padding-right:300px;font-weight: bolder;">TOTAL INNING - 2</span>
                                        <span style="font-size:1.6rem;font-weight: bolder;">AVERAGE-24%</span>
                                    </div>
                                    <div style="font-size:1.2rem;">
                                        <span style="font-size:1.6rem;padding-right: 210px;font-weight: bolder;">STRIKE RATE-100%</span>
                                        <span style="font-size:1.6rem;">4/6-0/0</span>
                                    </div> -->
                                
                                
                            </div>

                            
                            <div class="flex-fill" style="border-radius:12px;">
                                <div class="border-bottom ps-3 py-1 text-white border-warning border-3" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:40px">
                                    Base Points : <?php echo $row['base_price'] ?> Points
                                </div>
                                <div class="d-flex justify-content-around aling-items-center text-white mt-3 p-md-0 py-4" style="font-size:21px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                    <div>
                                        <!-- <span class="d-block">TEAM</span> -->
                                        <div class="image"></div>
                                    </div>
                                    <div style="font-size:2.0rem;padding-right: 250px;padding-top:1.0rem;" class="">
                                        <span>TOTAL INNING - 2<br></span>
                                        <span>AVERAGE-24%<br></span>
                                        <span>STRIKE RATE-100%<br></span>
                                        <span>Wicket- 4/6</span>
                                    </div>
                                    <div style="font-size:2.0rem;padding-top:1.0rem;">
                                        <span class="d-block">TEAM-<?php echo $row['team_name'] ?></span>
                                        <div class="image" style="background: url('./assets/logos/<?php echo $row['team_name'] ?>.png');"></div>
                                    </div>
                                    
                                </div>
                                <div class="d-flex justify-content-around aling-items-center text-white mt-3 p-md-0 py-4" style="padding-right:100px;font-size:30px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>