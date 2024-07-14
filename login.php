<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="js/login.js" defer></script>
    <title>Login</title>
</head>
<body>
    <nav>
        <a href="index.php">Back to Home page</a>
    </nav>
    <div class="center_form">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <label>
                    Sign in
                </label><br>
                <input type="email" name="user_email" id="email" placeholder="Enter email address" required><br>
                <input type="password" name="user_password" id="password" placeholder="Enter password" required><br>
                <button type="submit" id="login">
                    Enter
                </button>
            </fieldset>
        </form>
    </div>
    <!-- Available logins:
    username: ec12345@qmul.ac.uk, password: qmul!1234
    username: ec67890@qmul.ac.uk, password: qmul!6789 -->
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
            $emailAddress = $_POST['user_email'];
            $userpassword = $_POST['user_password'];
            $sql = "SELECT email, password FROM LOGIN";
            $found = false;
            $result = $conn->query($sql);
            if ($result == TRUE) {
                while($row = $result->fetch_assoc()){
                    if($row['email'] == $emailAddress and $row['password'] == $userpassword){
                        $found = true;
                    }
                }
            }
            if($found == true){
                session_start();
                $_SESSION['ID'] = $emailAddress;
                header('Location: addEntry.php');
            }
            else{
                ?>
                <script>
                    let fd = document.querySelector('fieldset');
                    let loginButton = document.getElementById('login');
                    let n = document.createElement('p');
                    let invalidLogin = document.createTextNode('Invalid login. Please try again.');
                    n.appendChild(invalidLogin);
                    fd.insertBefore(n, loginButton);
                </script>
                <?php
            }
        }
        $conn->close();
    ?>
</body>
</html>