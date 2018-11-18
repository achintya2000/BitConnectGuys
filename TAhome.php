<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TA | Home</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <header>
        <div class="container">
            <div>
                <h1>
                    Tutor <span class="highlight"> Tinder</span>
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

    <section id="UserProfile">
        <?php
            if (isset($_SESSION['userID'])) {
          ?>
            <html>
            <h1 style='padding-top:30px'>
                You are logged in. <a href='/TAEditProfile.php'>Edit Profile </a>
                    </h1>
            <h1 style='padding-top:5px'>
                Teaching Assitant Username         
                    </h1>
            <p style='padding-left: 40px'>
                        <?php echo($_SESSION["userUid"]) ?> 
                    </p>
            <h2 style='padding-top:30px'>
                        Sections TA'ing
                    </h2>
            <p style='padding-left: 40px'>
                        Section <?php echo($_SESSION["lSection"]) ?>
                    </p>
            <h2 style='padding-top: 30px'>
                        Email
                    </h2>
                    <p style='padding-left: 40px'>
                        <?php echo($_SESSION["userEmail"]) ?>
                    </p>
            <h3>Add/Delete Availability:</h3>
                <form method = "POST" action="TAhome.php">
                    <select name='dayofweek'>
                        <option value='' disabled selected hidden>Choose day...</option>
                        <option value='1'>Monday</option>
                        <option value='2'>Tuesday</option>
                        <option value='3'>Wednesday</option>
                        <option value='4'>Thursday</option>
                        <option value='5'>Friday</option>
                        <option value='6'>Saturday</option>
                        <option value='0'>Sunday</option>
                    </select>
                    <select name='time_catalog_1'>
                        <option value='' disabled selected hidden> HR</option>
                        <option value='12:00'>12:00</option>
                        <option value='12:30'>12:30</option>
                        <option value='01:00'>1:00</option>
                        <option value='01:30'>1:30</option>
                        <option value='02:00'>2:00</option>
                        <option value='02:30'>2:30</option>
                        <option value='03:00'>3:00</option>
                        <option value='03:30'>3:30</option>
                        <option value='04:00'>4:00</option>
                        <option value='04:30'>4:30</option>
                        <option value='05:00'>5:00</option>
                        <option value='05:30'>5:30</option>
                        <option value='06:00'>6:00</option>
                        <option value='06:30'>6:30</option>
                        <option value='07:00'>7:00</option>
                        <option value='07:30'>7:30</option>
                        <option value='08:00'>8:00</option>
                        <option value='08:30'>8:30</option>
                        <option value='09:00'>9:00</option>
                        <option value='09:30'>9:30</option>
                        <option value='10:00'>10:00</option>
                        <option value='10:30'>10:30</option>
                        <option value='11:00'>11:00</option>
                        <option value='11:30'>11:30</option>
                    </select>
                    <select name='am_pm_1'>
                            <option value='' disabled selected hidden> A/P</option>
                            <option>AM</option>
                            <option>PM</option>
                    </select>
                    <select name='time_catalog_2'>
                        <option value='' disabled selected hidden> HR</option>
                        <option value='12:00'>12:00</option>
                        <option value='12:30'>12:30</option>
                        <option value='01:00'>1:00</option>
                        <option value='01:30'>1:30</option>
                        <option value='02:00'>2:00</option>
                        <option value='02:30'>2:30</option>
                        <option value='03:00'>3:00</option>
                        <option value='03:30'>3:30</option>
                        <option value='04:00'>4:00</option>
                        <option value='04:30'>4:30</option>
                        <option value='05:00'>5:00</option>
                        <option value='05:30'>5:30</option>
                        <option value='06:00'>6:00</option>
                        <option value='06:30'>6:30</option>
                        <option value='07:00'>7:00</option>
                        <option value='07:30'>7:30</option>
                        <option value='08:00'>8:00</option>
                        <option value='08:30'>8:30</option>
                        <option value='09:00'>9:00</option>
                        <option value='09:30'>9:30</option>
                        <option value='10:00'>10:00</option>
                        <option value='10:30'>10:30</option>
                        <option value='11:00'>11:00</option>
                        <option value='11:30'>11:30</option>
                        </select>
                        <select name='am_pm_2'>
                            <option value='' disabled selected hidden> A/P</option>
                            <option>AM</option>
                            <option>PM</option>
                        </select>
                        <input type='Submit' name='submit-AT' value='Add time'/>
                        <input type='Submit' name='submit-DT' value='Delete time'/>
                        <br>
                        <br>
                    </form>
            </html>      
                <?php
                include("../html/scripts/timehandler.php");
                $conn = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "b9b0bab205ee44", "4268dd78", "heroku_0671d1b843b6769");
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }else {
                }

                $id = $_SESSION['userID'];
                $string = $_SESSION['string'];

                if (isset($_POST["submit-AT"])){
                    $day = $_POST['dayofweek'];
                    $sT = $_POST['time_catalog_1'];
                    $am_pm1 = $_POST['am_pm_1'];
                    $eT = $_POST['time_catalog_2'];
                    $am_pm2 = $_POST['am_pm_2'];
            
                    $var = add_time($day, $sT, $am_pm1, $eT, $am_pm2, $string);
                    $_SESSION['string'] = $var;
                    
                    $query  = "UPDATE ta_users SET userAvail='$var' WHERE idUsers=$id";
                    
                    $result = $conn->query($query);
                    mysqli_close($conn);
                }
                if (isset($_POST["submit-DT"])){
                    $day = $_POST['dayofweek'];
                    $sT = $_POST['time_catalog_1'];
                    $am_pm1 = $_POST['am_pm_1'];
                    $eT = $_POST['time_catalog_2'];
                    $am_pm2 = $_POST['am_pm_2'];
            
                    $var = delete_time($day, $sT, $am_pm1, $eT, $am_pm2, $string);
                    $_SESSION['string'] = $var;
                    
                    $query  = "UPDATE ta_users SET userAvail='$var' WHERE idUsers=$id";
                    
                    $result = $conn->query($query);
                    mysqli_close($conn);
                }

                $string = $_SESSION['string'];
                create_table($string);

            } else {
                echo '<h1 style="padding-top:30px">
                        You are not logged in.
                        </h1>';
            }
        ?>
    </section>

</body>

</html>