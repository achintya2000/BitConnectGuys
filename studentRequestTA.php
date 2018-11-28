<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Students | Request a TA </title>
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

    <div>
        <form method="POST" class="form" action="./studentRequestReturn.php" style="margin-top: 5%">
            Day of the Week <br>
            <input type="date" name="date"/>
            <br>
            Select a Time <br>

            <select id="select-box" name='catalog_1'>
                <option value='' disabled selected hidden> Select Time</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="01:00">1:00</option>
                <option value="01:30">1:30</option>
                <option value="02:00">2:00</option>
                <option value="02:30">2:30</option>
                <option value="03:00">3:00</option>
                <option value="03:30">3:30</option>
                <option value="04:00">4:00</option>
                <option value="04:30">4:30</option>
                <option value="05:00">5:00</option>
                <option value="05:30">5:30</option>
                <option value="06:00">6:00</option>
                <option value="06:30">6:30</option>
                <option value="07:00">7:00</option>
                <option value="07:30">7:30</option>
                <option value="08:00">8:00</option>
                <option value="08:30">8:30</option>
                <option value="09:00">9:00</option>
                <option value="09:30">9:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
            </select>
            <select name='am_pm'>
                    <option value='' disabled selected hidden> A/P</option>
                    <option value = "AM">AM</option>
                    <option value = "PM">PM</option>
            </select> <br>
            Lab Section <br>
            <select name="var_section">
                <option value="" disabled selected hidden> LS </option>
                <option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
            </select> <br>
            Preferred TA <br>
            <select name="prefTA">
                <option value="" disabled selected hidden>Pick Favorite TA</option>
                
                <?php
                    require("scripts/dbh.inc.php");

                    $sql  = "SELECT uidUsers FROM ta_users";
                    $result = $conn->query($sql);
                    $name_list = array();
                    while($row = $result->fetch_array()[0]){
                        $name_list[] = $row;
                    }
                    $option = '';
                    for($h=0;$h < count($name_list); $h++){
                        $option .='<option value="'.$name_list[$h].'">'.$name_list[$h].'</option>';
                    }
                    echo $option;
                    mysqli_close($conn);
                ?>
                
            </select> <br>
            <br>
            <button name="submitrequest">
                Submit
            </button>
        </form>

    </div>

</body>

</html>