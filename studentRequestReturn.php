<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student | TA Returns</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <header>
        <div class="container">
            <div>
                <h1>
                Duke <span class="highlight"> Tutor</span>
                </h1>
            </div>
            <nav>
                <ul>
                    <li class="current">
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="form2">
        <?php
            $date = date('d,m,Y',strtotime($_POST['date']));
            $split = explode(",", $date);
            $day = intval($split[0]);
            $month = intval($split[1]);
            $year = intval($split[2]);
            $jd = gregoriantojd($month,$day,$year);
            $time = $_POST['catalog_1'];
            $section = $_POST['var_section'];
            $pName = $_POST['prefTA'];
            $pAMPM = $_POST['am_pm'];
            $dow = jddayofweek($jd, 0);
            
            $expiry_date = $_POST['date'];
            $today = time();
            $interval = strtotime($expiry_date) - $today;
            $days = floor($interval / 86400); // 1 day
            
            if($days > 7) {
                echo "ERROR: MUST BE WITHIN NEXT 7 DAYS";

            } else {

                include "scripts/timehandler.php";
                include "scripts/webhandler.inc.php";
                require "scripts/dbh.inc.php";


                $sql  = "SELECT uidUsers FROM ta_users";
                $result = $conn->query($sql);
                $name_list = array();
                while($row = $result->fetch_array()[0]){
                    $name_list[] = $row;
                }
                $sql  = "SELECT emailUsers FROM ta_users";
                $result = $conn->query($sql);
                $email_list = array();
                while($row = $result->fetch_array()[0]){
                    $email_list[] = $row;
                }
                $sql  = "SELECT labSection FROM ta_users";
                $result = $conn->query($sql);
                $section_list = array();
                while($row = $result->fetch_array()){
                    $section_list[] = intval($row[0]);
                }
                $sql  = "SELECT userAvail FROM ta_users";
                $result = $conn->query($sql);
                $avail_list = array();
                while($row = $result->fetch_array()){
                    $avail_list[] = $row[0];
                }
                $emails =  sort_database($name_list, $email_list, $avail_list, $section_list , $pName, $dow, $time, $pAMPM, $section);
                for($h = 0; $h <count($name_list);$h++)
                {
                    if(isset($_POST[$name_list[$h]]) && isset($_POST['firstlast']) && isset($_POST['sEmail'])){

                        send_emails($_POST['sEmail'], $email_list[$h]); 
                        $var = book_session($_SESSION['dow'], $_SESSION['time'], $_SESSION['AMorPM'],$_SESSION['string']);
                                            
                        $query  = "UPDATE ta_users SET userAvail='$var' WHERE emailUsers='$email_list[$h]'";
                    
                        $result = mysqli_query($conn, $query);
                    }
                }

            }
            mysqli_close($conn);
        ?>
    </div>

</body>

</html>