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
    <title>TA | Edit Profile</title>
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
        <a href = "TAhome.php">Back</a>
        <form action="./studentRequestReturn.php">
            Name: <br>
            <input type="text" name="firstlast"><br>
            Email: <br>
            <input type="email" name="semail"><br>
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
            <br>
            <button name="submitrequest">
                Submit
            </button>
        </form>

    </div>

</body>

</html>