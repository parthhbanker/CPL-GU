<?php include('data.php'); ?>

<style>
    #bid_left {


        visibility: hidden;
        width: 65px;
        background-color: black;
        color: #fff;
        text-align: center;
        padding: 0px 0px;
        border-radius: 6px;
        margin-left: 220px;
        margin-top: 5px;


        /* Position the tooltip text - see examples below! */
        position: absolute;
        z-index: 1;
    }

    #bid_count {
        visibility: hidden;
        width: 65px;
        background-color: black;
        color: #fff;
        text-align: center;
        padding: 0px 0px;
        border-radius: 6px;
        /* margin-left: 40px; */
        margin-top: 5px;
        /* Position the tooltip text - see examples below! */
        position: absolute;
        z-index: 1;
    }

    span.float-right.summary_icon {
        font-size: 3rem;
        position: absolute;
        right: 1rem;
        color: #ffffff96;
    }

    .imgs {
        margin: .5em;
        max-width: calc(100%);
        max-height: calc(100%);
    }

    .imgs img {
        max-width: calc(100%);
        max-height: calc(100%);
        cursor: pointer;
    }

    #imagesCarousel,
    #imagesCarousel .carousel-inner,
    #imagesCarousel .carousel-item {
        height: 60vh !important;
        background: black;
    }

    #imagesCarousel .carousel-item.active {
        display: flex !important;
    }

    #imagesCarousel .carousel-item-next {
        display: flex !important;
    }

    #imagesCarousel .carousel-item img {
        margin: auto;
    }

    #imagesCarousel img {
        width: auto !important;
        height: auto !important;
        max-height: calc(100%) !important;
        max-width: calc(100%) !important;
    }
</style>

<div class="container-fluid">
    <div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php echo "Welcome back " . $_SESSION['team_login_username'] . "!"  ?>
                    <hr>

                    <!-- Used point stat -->
                    <div class="row">

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Players Bidded
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><span id="player_count"></span> Players</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" id="pg_bar" style="width: 100%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="12"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Points (Used / Left)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">&nbsp;</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress">

                                                        <div class="progress-bar" role="progressbar" id="bc" style="width: 15%;" aria-valuenow="600" aria-valuemin="0" aria-valuemax="50000"></div>
                                                        <div class="progress-bar bg-warning" role="progressbar" id="bl" style="width: 50%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="50000"></div>
                                                    </div>
                                                    <span class="tooltiptext" style="visibility: hidden;" id="bid_count"></span>
                                                    <span class="tooltiptext" style="visibility: hidden;" id="bid_left"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-2" style="font-size: 14px;">
                                                Average Bid Point Used</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <span id="bid_avg"></span> Points
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xl-8 col-md-6 mb-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Bidding Summary
                                </div>
                                <div class="card-body" id="lol"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
                            </div>
                        </div>

                        <!-- Card starts -->
                        <div class="col-xl-4 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-auto py-2 ">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-2" style="font-size: 14px;">
                                                Highest Bid</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <span id="highest_bid"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-left-primary shadow h-auto py-2 mt-5">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-2" style="font-size: 14px;">
                                                Average Bid Point Left</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <span id="bid_left_avg"></span> Points
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-left-primary shadow h-auto py-2 mt-5">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-2" style="font-size: 14px;">
                                                Lowest Bid</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <span id="lowest_bid"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    if (typeof(EventSource) !== "undefined") {
        var source = new EventSource("server.php");
        source.onmessage = function(event) {

            chart_data();
            // document.getElementById("result").innerHTML += event.data + "<br>";
        };
    } else {
        document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
    }
</script>

<script>
    datas = {}

    $("#bc").hover(function() {
        $("#bid_count").css("visibility", "visible")
        // $(this).css("background-color", "grey");
    }, function() {
        $(".tooltiptext").css("visibility", "hidden")
        // $(this).css("background-color", "blue");
    });

    $("#bl").hover(function() {
        $("#bid_left").css("visibility", "visible")
        // $(this).css("background-color", "grey");
    }, function() {
        $(".tooltiptext").css("visibility", "hidden")
        // $(this).css("background-color", "blue");
    });

    get_data();

    // call getdata on every seconf

    setInterval(function() {
        get_data();
    }, 100);


    function chart_data() {

        $.ajax({

            url: "ajax1.php",
            type: "POST",
            data: "&team_id=<?php echo $_SESSION['team_login_team_id'] ?>&action=get_bids_pie_chart",
            success: function(data) {

                // alert(data);

                array = data.split(";");


                // var team_id = <?php echo $_SESSION['team_login_team_id']?> ;

                // if (team_id == array[0]){

                //     alert(team_id);

                // }

                // Pie Chart Example
                $("#myPieChart").remove();
                var txt1 = "<canvas id=\"myPieChart\" width=\"100%\" height=\"50\">";
                $("#lol").append(txt1);

                var ctx = document.getElementById("myPieChart");
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: [array[2], array[4], array[6], array[8], array[10], array[12], array[14], array[16], array[18], array[20], array[22], array[24], array[26], "Points Left"],
                        datasets: [{
                            data: [array[3], array[5], array[7], array[9], array[11], array[13], array[15], array[17], array[19], array[21], array[23], array[25], array[27], 50000 - array[1]],
                            backgroundColor: ['Blue', '#33cccc', '#28a745', '#99ff33', '#ffff00', '#ffcc00', '#ffa500', '#ff0000', '#800000', '#cc0066', '#800080', '#9900ff', '#cc33ff', '#000066'],
                        }],
                    },
                });

            }


        })

    }

    // make a function to continously call data.php
    function get_data() {
        $.ajax({
            url: "data.php",
            type: "POST",
            data: "&team_id=<?php echo $_SESSION['team_login_team_id'] ?>&page=home",
            success: function(data) {

                // console.log(data);
                datas = JSON.parse(data);

                // map all the data to the html
                $("#player_left").html(datas.player_left);
                $("#bid_left").html(datas.bid_left);
                $("#bid_left_avg").html(datas.bid_left_avg);
                $("#highest_bid").html(datas.highest_bid + " on " + datas.highest_bid_player);
                $("#lowest_bid").html(datas.lowest_bid + " on " + datas.lowest_bid_player);
                $("#player_count").html(datas.player_count);
                $("#bid_count").html(datas.bid_count);
                $("#bid_avg").html(datas.bid_avg);

                $bid_left = datas.bid_left;

                pg = (100 / 13) * datas.player_count

                document.getElementById('pg_bar').style.width = pg + "%";

                pu = (100 / 50000) * datas.bid_count;
                // alert("pl "+pl)

                document.getElementById("bc").style.width = pu + "%";

                pl = (100 / 50000) * datas.bid_left;
                document.getElementById("bl").style.width = pl + "%";

                // alert(document.getElementById("bc").style.width);

                // if the bid is not yet started
                if (datas.bid_avg == null) {
                    $("#bid_avg").html("0");
                } else { 
                    $("#bid_avg").html(datas.bid_avg);
                }

                // if highest bid is zero show no bid
                if (datas.highest_bid == 0) {
                    $("#highest_bid").html("No Bid");
                }
                // if lowest bid is zero show no bid
                if (datas.lowest_bid == 0) {
                    $("#lowest_bid").html("No Bid");
                }
            }
        });
    }

    chart_data();
</script>