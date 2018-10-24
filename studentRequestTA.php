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

    <div class="request-tutor">
        <form action="./studentRequestReturn.php">
            Name: <br>
            <input type="text" name="firstlast"><br>
            Email: <br>
            <input type="email" name="semail"><br>
            Day of the Week <br>
            <select name="dayofweek">
                <option value="" disabled selected hidden>Choose day...</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
            </select> <br>
            Select a Time <br>
            <select name="hour">
                <option value="" disabled selected hidden> HR</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
            <select name="minute">
                <option value="" disabled selected hidden> MN</option>
                <option>00</option>
                <option>15</option>
                <option>30</option>
                <option>45</option>
            </select>
            <select name="ampm">
                <option value="" disabled selected hidden> A/P</option>
                <option>AM</option>
                <option>PM</option>
            </select> <br>
            Lab Section <br>
            <select name="section">
                <option value="" disabled selected hidden> LS </option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
            </select> <br>
            Preferred TA <br>
            <select name="prefTA">
                <option value="" disabled selected hidden>Pick Favorite TA</option>
                <option>Micheal Dodd</option>
                <option>Micheal Dodd</option>
                <option>Micheal Dodd</option>
                <option>Micheal Dodd</option>
                <option>Micheal Dodd</option>
            </select> <br>
            <br>
            <button name="submitrequest">
                Submit
            </button>
        </form>

    </div>

</body>

</html>