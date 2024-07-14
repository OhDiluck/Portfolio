<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/phone2.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="css/phone.css" media="screen and (min-width: 768px) and (max-width: 1004px)">
    <link rel="stylesheet" href="css/tablet.css" media="screen and (min-width: 1004px) and (max-width: 1227px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="js/index.js" defer></script>
    <title>Welcome to my portfolio!</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>
                Mustafa El Gawish<br>
                Welcome to my portfolio!
            </h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_me.html">About me</a></li>
                <li><a href="skills.html">Skills and achievements</a></li>
                <li><a href="education.html">Education and qualifications</a></li>
                <li><a href="experience.html">Experience</a></li>
                <li><a href="viewBlog.php">Blog</a></li>
                <?php
                    if(isset($_SESSION['ID'])){
                        echo "<li><a href='index.php?lnk'>Log out</a></li>";
                    }
                ?>
            </ul>
        </nav>
        <?php
            if(isset($_GET['lnk'])){
                header('Location: logout.php');
            }
        ?>
        <?php
        if(isset($_SESSION['ID'])){
            echo "<p>Logged in as: " . $_SESSION['ID'] . "</p>";
        }
        ?>
        <aside>
            <form action="login.php" method="get">
                <?php
                    if (isset($_SESSION['ID'])){
                        echo '<button type="submit" id="button" hidden></button>';
                    }
                    else{
                        echo '<button type="submit" id="button">Log in</button>';
                    }
                ?>
                
            </form>
        </aside>
        <footer>
            <h3>
                Contacts
            </h3>
            <ul>
                <li>
                    <a href="https://www.linkedin.com/in/mustafa-el-gawish-74935325a/"><img src="images/linkedin.png"></a>
                    <div class="caption">
                        Linkedin
                    </div>
                </li>
                <li>
                    <a href="mailto:ec22746@qmul.ac.uk"><img src="images/outlook.png"></a>
                    <div class="caption">
                        Outlook
                    </div>
                </li>
                <li>
                    <a href="https://wa.me/07367581691"><img src="images/whatsapp.png"></a>
                    <div class="caption">
                        Whatsapp
                    </div>
                </li>
            </ul>
        </footer>
    </div>
</body>
</html>