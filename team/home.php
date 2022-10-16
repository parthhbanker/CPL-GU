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

<div class="containe-fluid">
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
                                                <?php echo $player_count ?> Players
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
                                                <?php echo $bid_count ?> Points
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
                                                <?php echo $bid_avg ?> Points
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
                                                <?php echo $player_left ?> Players
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
                                                <?php echo $bid_left ?> Points
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
                                                <?php echo $bid_left_avg ?> Points
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
                                                <?php echo $highest_bid > 0 ? $highest_bid . " Points on " . $highest_bid_player : "No Bids Yet" ?>
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
                                                <?php 
                                                echo $lowest_bid > 0 ? $lowest_bid . " Points on " . $lowest_bid_player :
                                                    "No Bids Yet";

                                                ?>
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