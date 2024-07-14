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
    <link rel="stylesheet" href="css/addEntry.css">
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
    <script src="js/addEntry.js" defer></script>
    <title>Add Post</title>
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
            <li><a href="addEntry.php?lnk">Log out</a></li>
        </ul>
    </nav>
    <?php if(isset($_GET['lnk'])){
        header('Location: logout.php');
    }
    ?>
    <div class="center_blog">
        <form action="addPost.php" method="post">
            <fieldset>
                <label>
                    Add Blog
                </label>
                <div id="boxes">
                    <textarea name="title" id="title" rows="1" cols="120" placeholder="Title" required></textarea><br>
                    <textarea name="description" id="description" rows="10" cols="120" placeholder="Description" required></textarea><br>
                </div>
                <button type="submit" name="post_blog" id="postBlog">
                    Post
                </button>
                <button type="reset" name="clear_blog" id="clearBlog">
                    Clear
                </button>
            </fieldset>
        </form>
    </div>
</body>
</html>