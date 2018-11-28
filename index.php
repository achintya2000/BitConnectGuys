<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Matching tutors and students at Duke's EGR 103">
    <meta name="keywords" content="EGR 103 Tutor, Tutor Tinder, Duke Tutor Tinder, Duke EGR 103">
    <title>Tutor Tinder | Welcome!</title>
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

    <section id="division">
        <a href="studentRequestTA.php">
            <div class="split left">
                <div class="centered">
                    <img src="./img/study.png">
                    <h1>
                        Students Click Here To Get Started!
                    </h1>
                </div>
            </div>
        </a>
        <a href="TAlogin.php">
            <div class="split right">
                <div class="centered">
                    <img src="./img/teacher.png">
                    <h1>
                        Teachers Click Here To Get Started!
                    </h1>
                </div>
            </div>
        </a>
    </section>

</body>

</html>