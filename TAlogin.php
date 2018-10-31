<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TA | Login</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script type="text/javascript" src="scripts/TAlogin.js"></script>
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

    <div class="login-page">
        <div class="form">
            <form id="registration" style="display:none" action="includes/../scripts/signup.inc.php" method="post">
                <input type="text" placeholder="username" 
                name="uid"/>
                <input type="password" placeholder="password" name="pwd"/>
                <input type="password" placeholder="repeat password" name="pwd-repeat"/>
                <input type="text" placeholder="email address" name="mail" />
                <input type="number" placeholder="lab section" name="section"/>
                <button type="submit" name="signup-submit">SIGN UP </button>
                <p id="message">Have an account? <a href="javascript:toggle()"> Sign In Here </a></p>
            </form>
            <form id="login-form" style="display:inline" action="includes/../scripts/login.inc.php" method="post">
                <input type="text" placeholder="username/e-mail" name="mailuid" />
                <input type="password" placeholder="password" name="pwd"/>
                <button type="submit" name="login-submit"> LOGIN </button>
                <p id="message">No Account? <a href="javascript:toggle()">Create an account</a></p>
            </form>
        </div>
    </div>


</body>

</html>