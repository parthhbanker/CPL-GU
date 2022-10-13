<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title> main Auction card</title>
    <style>
        #player-image{
            background:url('./virat.png') center center/cover no-repeat;
            height:23rem;width:20rem;
            border-radius:12px
        }
    </style>
</head>
<!-- 160x198 -->

<body>
    <div class="container-fluid d-flex justify-content-center w-md-0 w-sm-50 align-item-center m-0 p-0 ">
        <div class="card" style=" width:100rem; height:50rem; background:#333333">
            <div class="card-body m-0">
                <div class="row g-0">
                    <div class="col-md-4 border-0 border-primary flex-column d-flex justify-content-center align-items-center px-2 gap-3">
                        <div class="container m-0 border text-white border-3 text-center p-2"
                            style="background-color:#A90000;border-radius:12px">
                            <span style="font-size:30px" class="d-block fw-bold">BATSMAN</span>
                            <span style="font-size:12px" class="d-block">LEFT HAND BATSMAN</span>
                        </div>
                        <div class="container d-flex flex-column justify-content-center align-items-center m-0 border border-4 border-warning" 
                        style=" width:30rem; height:32rem; border-radius:12px;background:#B0A88F">

                            <div class="mt-2 mb-0" id="player-image">
                                <span class="fs-2 px-2">01</span>
                            </div>
                            <br>
                            <!-- <hr class="border border-3 w-100 m-0 mt-2"> -->
                            <div class="m-0 border text-white border-3 bg-secondary text-center p-2"
                                style="border-radius:12px; background-image: linear-gradient(#333333,#B0A88F ); font-size:25px ">
                                <span class="d-block" style="font-size:40px">PLAYER NAME</span>
                                <span class="d-block" style="font-size:20px">SEMESTER-3</span>
                                <!-- <span class="d-block" style="font-size:25px">STATUS</span> -->
                            </div>
                            <!-- <div class="p-2 m-0 text-white d-flex flex-column justify-content-center align-items-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                
                                
                            </div> -->
                        </div>
                    </div>


                    <div class="col-md-8 border-0 border-success d-flex flex-column justify-content-start gap-3 px-2 my-md-0 my-3 ">
                        <div class="d-flex flex-md-row flex-column justify-content-center container-fluid m-0 gap-2">
                            <div class="m-0 border text-white border-3 flex-fill text-center p-2"
                                style="background-color:#A90000;border-radius:12px">
                                <div>
                                    <span>TOTAL INNING - 2</span>
                                    <span>AVERAGE-24%</span>
                                </div>
                                <div>
                                    <span>STRIKE RATE-100%</span>
                                    <span>4/6-0/0</span>
                                </div>
                            </div>
                            <div class="m-0 border text-white border-3 bg-secondary text-center p-2"
                                style="border-radius:12px; background-image: linear-gradient(#333333,#B0A88F ); font-size:25px ">
                                STATUS
                                <!-- <span class="d-block" style="font-size:25px">STATUS</span> -->
                            </div>
                        </div>
                        <div class="bg-secondary border border-4 flex-fill" style=" background-image: linear-gradient(#333333,#B0A88F );  border-radius:12px">
                            <div class="border-bottom ps-3 py-1 text-white border-warning border-3" 
                                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:40px" >
                                Base Price : $***
                            </div>
                            <div class="d-flex justify-content-around aling-items-center text-white mt-3 p-md-0 py-4" 
                                style="font-size:19px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                <span class="d-block" style= "font-size:40px;">TEAM</span>
                                <span class="d-block"- style= "font-size:40px;">BID PRICE : $***</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>