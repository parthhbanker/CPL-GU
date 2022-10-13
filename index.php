<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body onload="table();">
    
<script>
    function table(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
                document.getElementById('main').innerHTML = this.responseText;
            
        }

        xhttp.open("GET","main.php");
            xhttp.send();
    }

    setInterval(function(){
        table();
    },100);
</script>
<div id="main">
        
</div>


</html>