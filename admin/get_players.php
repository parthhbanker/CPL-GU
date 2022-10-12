<?php

use LDAP\Result;

    require('db_connect.php');
    require('functions.php');
    $pro_id = get_safe_value($conn,$_POST['pro_id']);
    $result = mysqli_query($conn, "select distinct(id) , player_name from player where pro_id = '$pro_id' ");

    $str = "";
    // return "het";

    while($row = $result->fetch_assoc()){

        foreach ($row as $value) {

            echo($value.";");

        }
    }

    // echo $str ;

?>