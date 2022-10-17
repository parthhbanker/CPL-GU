<?php

extract($_POST);

if ($action == "refresh") {

    rename("0.txt", "1.txt");
    echo ("renamed");
} else {

    session_write_close();
    ignore_user_abort(true);
    set_time_limit(0);
    while (true) {
        // here goes the 

        if (file_exists("1.txt")) {

            rename("1.txt", "0.txt");
            break;
        }

        // sleep(2);
    }
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

    $time = date('r');
    echo "data: refresh\n\n";
    flush();

}

?>