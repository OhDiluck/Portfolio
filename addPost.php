<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>
    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ecs417";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $dateSubmitted = date('Y-m-d H:i:s');
            $sql = "INSERT INTO blog (title, description, blogdate)
            VALUES ('$title', '$description', '$dateSubmitted')";
            $result = $conn->query($sql);
            if($result==TRUE){
                header('Location: viewBlog.php');
            }
        }
        $conn->close();
    ?>
</body>
</html>