<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutor Tinder | About</title>
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
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="current">
                        <a href="about.php">About</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="MainAbout">
        <div class="container">
            <h1>
                What is Tutor Tinder?
            </h1>
            <p style="font-size: 17px">
                Tutor Tinder is a dynamic matching system that allows students and TA's in Duke's EGR 103 class to
                connect.
            </p>
            <br>
            <h1>
                Why Use Tutor Tinder?
            </h1>
            <p style="font-size: 17px">
                I don't know
            </p>
            <br>
            <h1>
                Who Created Tutor Tinder?
            </h1>
            <p style="font-size: 17px">
                Duke Univeristy EGR 101 Section 6 Group 9
            </p>
        </div>
    </section>

    <div id="like_button_container"></div>

    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

    <!-- Load our React component. -->
    <script src="./scripts/like_button.js"></script>

</body>

</html>