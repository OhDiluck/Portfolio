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
    <link rel="stylesheet" href="css/viewBlog.css">
    <link rel="stylesheet" href="css/phone2.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="css/phone.css" media="screen and (min-width: 768px) and (max-width: 1004px)">
    <link rel="stylesheet" href="css/tablet.css" media="screen and (min-width: 1004px) and (max-width: 1227px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <title>View Blogs</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about_me.html">About me</a></li>
            <li><a href="skills.html">Skills and achievements</a></li>
            <li><a href="education.html">Education and qualifications</a></li>
            <li><a href="experience.html">Experience</a></li>
            <li><a href="viewBlog.php">Blog</a></li>
            <?php 
            if (isset($_SESSION['ID'])){
                echo "<li><a href='addEntry.php'>Add Blog</a></li>";
                echo "<li><a href='viewBlog.php?lnk'>Log out</a></li>";
            }
            else{
                echo "<li><a href='login.php'>Add blog</a></li>";
                session_destroy();
            }
            ?>
        </ul>
    </nav>
    <header>
        <h1>
            Blogs
        </h1>
    </header>
    <div class="center_blogs">
        <div class="blog">
    <?php
        if(isset($_GET['lnk'])){
            header('Location: logout.php');
        }
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ecs417";
        $blogsArray = array();
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die("Connection failed:" . $conn->connect_error);
        }
        $sql = "SELECT title, description, blogdate FROM blog";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $blog = array($row['blogdate'], $row['title'], $row['description']);
            $blogsArray[] = $blog;
        }
        if(count($blogsArray) == 0){
            header('Location: login.php');
        }
        $sorted = false;
        $dateSorted = false;
        $bypass = 0;
        while($sorted == false){
            $dateSwap = false;
            $timeSwap = false;
            for($x=0; $x<count($blogsArray)-1; $x++){
                $date = substr(implode(explode("-", $blogsArray[$x][0])), 0, 8);
                $nextDate = substr(implode(explode("-", $blogsArray[$x+1][0])), 0, 8);
                if($dateSorted == false){
                    if((int)$date < (int)$nextDate){
                        $temp = $blogsArray[$x];
                        $blogsArray[$x] = $blogsArray[$x+1];
                        $blogsArray[$x+1] = $temp;
                        $dateSwap = true;
                    }
                }
                else{
                    $time = substr(implode(explode(":", $blogsArray[$x][0])), 10, 7);
                    $nextTime = substr(implode(explode(":", $blogsArray[$x+1][0])), 10, 7);
                    if((int)$date == (int)$nextDate){
                        if((int)$time < (int)$nextTime){
                            $temp = $blogsArray[$x];
                            $blogsArray[$x] = $blogsArray[$x+1];
                            $blogsArray[$x+1] = $temp;
                            $timeSwap = true;
                        }
                    }
                }
            }
            if($dateSwap == false){
                $dateSorted = true;
                $bypass++;
            }
            if($bypass >= 2 and $timeSwap == false){
                $sorted = true;
            }
        }
        for($i=0; $i<count($blogsArray); $i++){
            $date = $blogsArray[$i][0];
            $day = substr($date, 8, 2);
            $dayLstNum = substr($day, 1, 1);
            $suffix = "th";
            switch($dayLstNum){
                case 1:
                    $suffix = "st";
                    break;
                case 2:
                    $suffix = "nd";
                    break;
                case 3:
                    $suffix = "rd";
                    break;
            }
            $m = substr($date, 5, 2);
            switch($m){
                case "01":
                    $month = "January";
                    break;
                case "02":
                    $month = "February";
                    break;
                case "03":
                    $month = "March";
                    break;
                case "04":
                    $month = "April";
                    break;
                case "05":
                    $month = "May";
                    break;
                case "06":
                    $month = "June";
                    break;
                case "07":
                    $month = "July";
                    break;
                case "08":
                    $month = "August";
                    break;
                case "09":
                    $month = "September";
                    break;
                case "10":
                    $month = "October";
                    break;
                case "11":
                    $month = "November";
                    break;
                case "12":
                    $month = "December";
                    break;
            }
            $year = substr($date, 0, 4);
            $hour = substr($date, 11, 2);
            $minute = substr($date, 14, 2);
            $blogDate = $day . $suffix . " " . $month . " " . $year . ", " . $hour-1 . ":" . $minute . " UTC";
            echo "<section>";
            echo "<p class='date'>" . $blogDate .  "</p>";
            echo "<h3 class='blog_title'>" . $blogsArray[$i][1] . "</h3>";
            echo "<p class='blog_description'>" . $blogsArray[$i][2] . "</p>";
            echo "</section>";
        }
        $conn->close();
    ?>
        </div>
    </div>
</body>
</html>