<?php
function resetdb() {
    require 'dbh.inc.php';
    include 'timehandler.php';


    $sql = "SELECT idUsers FROM ta_users";
    $result = $conn->query($sql);
    $id_list = array();
    while($row = $result->fetch_array()[0]){
        $id_list[] = $row;
    }

    print_array($id_list);


    $sql  = "SELECT userAvail FROM ta_users";
    $result = $conn->query($sql);
    $time_list = array();
    while($row = $result->fetch_array()[0]){
        $time_list[] = $row;
    }

    print_array($time_list);

    $date = date('d,m,Y');
    $split = explode(",", $date);
    $day = intval($split[0]);
    $month = intval($split[1]);
    $year = intval($split[2]);
    $jd = gregoriantojd($month,$day,$year);
    $dow = jddayofweek($jd, 0);

    if($dow == 0)
    {
        $dow == 6;
    } else {
        $dow--;
    }


    for($h=0;$h < count($time_list); $h++) {
        $str = $time_list[$h];
        
        $time_list_string[$h]= string_to_array($str);
        for($i = 0; $i<strlen($time_list_string[$h][$dow]);$i++)
        {
            if($time_list_string[$h][$dow][$i]=="*")
            {
                $time_list_string[$h][$dow][$i]="1";
            }
        }
        $time_list[$h] = array_to_string($time_list_string[$h]);
    }
    for($h = 0;$h<count($time_list);$h++)
    {
        $query  = "UPDATE ta_users SET userAvail='$time_list[$h]' WHERE idUsers='$id_list[$h]'";
    }     

    $result = mysqli_query($conn, $query);
    mysqli_close($conn); 


}

resetdb();

