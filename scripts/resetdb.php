<?php
function resetdb() {
    require 'dbh.inc.php';
    include 'timehandler.php';

    $sql  = "SELECT userAvail FROM ta_users";
    $result = $conn->query($sql);
    $time_list = array();
    while($row = $result->fetch_array()[0]){
        $time_list[] = $row;
    }

    $time_list_string = array();
    $dateprog=$_GET['dateprog'];
    $dow = date("N",strtotime($dateprog))-1; 
    if($dow == 0)
    {
        $dow == 6;
    }
    else{
        $dow--;
    }

    for($h=0;$h < count($time_list); $h++) {
        $str = $time_list[$h];
        
        $time_list_string[$h]= string_to_array($str);
        for($i = 0; $i<strlen($time_list_string[$h][$dow]);$i++)
        {
            if($time_list_string[$h][$dow][$i]=="*")
            {
                $time_list_string[$h][$dow][$i]=="1";
            }
        }
    }    
}

