<?php
require __DIR__ . '/counter/counter.php';

// make one hit
makeHit();

// printing total hits
// echo "Total Hit: " . getHit();

// echo "<br>";

// add IP address if it doesn't exist in list
addUniqueIP();

// print unique visitors
// echo "Unique Visitors: " .getUniqueVisitor();

?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body onload="table();">


    <script>
        if (typeof(EventSource) !== "undefined") {
            var source = new EventSource("server.php");
            source.onmessage = function(event) {

                table();
                // document.getElementById("result").innerHTML += event.data + "<br>";
            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }
    </script>

    <script>
        function table() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById('main').innerHTML = this.responseText;

            }

            xhttp.open("GET", "main.php");
            xhttp.send();
        }

        // setInterval(function(){
        //     table();
        // },1000);
    </script>
    <div id="main">

    </div>


</html>