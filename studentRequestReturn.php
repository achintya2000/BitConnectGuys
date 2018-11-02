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

    <div id="returntable">
        <table style="width:400px">
            <tr>
                <th>FIRST NAME</th>
                <th>DAYS</th>
                <th>TIME</th>
                <th>SCHEDULE</th>
            </tr>
            <tr>
                <td>Michael Dodd</td>
                <td>Ex</td>
                <td>Ex</td>
                <td><a href="studentSchedule.php">Ex</a></td>
            </tr>
        </table>
    </div>


</body>

</html>