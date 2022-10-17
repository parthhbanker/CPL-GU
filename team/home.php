<?php include('data.php'); ?>

<style>
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

                        <!-- Card starts -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-2" style="font-size: 14px;">
                                                Total Players Bidded</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <span id="player_count"></span> Players
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card ends -->
                        <!-- Card starts -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-2" style="font-size: 14px;">
                                                Total Bid Points Used</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <span id="bid_count"></span> Points
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card ends -->
                        <!-- Card starts -->
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
                        <!-- card ends -->
                    </div>

                    <!-- point stats -->
                    <div class="row">

                        <!-- Card starts -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
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
                        </div>
                        <!-- card ends -->
                        <!-- Card starts -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
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
                        <!-- card ends -->
                    </div>

                    <!-- remaining point stats -->
                    <div class="row">

                        <!-- Card starts -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-2" style="font-size: 14px;">
                                                Players Left</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <span id="player_left"></span> Players
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card ends -->
                        <!-- Card starts -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-2" style="font-size: 14px;">
                                                Bid Point Left</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <span id="bid_left"></span> Points
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card ends -->
                        <!-- Card starts -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
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
                        </div>
                        <!-- card ends -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // use get_data on load

    // map the data to a dictionary
    datas = {}


    get_data();

    // call getdata on every seconf

    setInterval(function() {
        get_data();
    }, 100);

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
                $("#lowest_bid").html(datas.lowest_bid +  " on " + datas.lowest_bid_player);
                $("#player_count").html(datas.player_count);
                $("#bid_count").html(datas.bid_count);
                $("#bid_avg").html(datas.bid_avg);

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
</script>