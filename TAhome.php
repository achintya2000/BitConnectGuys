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
                echo "<h1 style='padding-top:30px'>
                        You are logged in.
                        </h1>";
                echo "<h1 style='padding-top:5px'>
                        Teaching Assitant Username         
                        </h1>";
                echo "<p style='padding-left: 40px'>"
                        .$_SESSION["userUid"]."
                    </p>";

                echo "<h2 style='padding-top:30px'>
                        Sections TA'ing
                    </h2>";
                echo "<p style='padding-left: 40px'>
                        Section " .$_SESSION["lSection"]."
                    </p>";
                echo "<h2 style='padding-top:30px'>
                        Times Available
                    </h2>
                    <p style='padding-left: 40px'>
                        Not Done Yet!!!!!
                    </p>";
                echo "<h2 style='padding-top: 30px'>
                        Email
                    </h2>
                    <p style='padding-left: 40px'>"
                        .$_SESSION["userEmail"]."
                    </p>";
            } else {
                echo '<h1 style="padding-top:30px">
                        You are not logged in.
                        </h1>';
            }
        ?>
    </section>

</body>

</html>