<?php
    session_start();
    require_once('./includes/config.php');
    $uid = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>Chats</title>
</head>
<body class="container">
    <a href="./complaint-history.php" class="btn btn-primary">Back</a>
    <form method="post">
        <?php
            $sql = "SELECT * FROM `chat` WHERE `userid`='${uid}'";
            $result = $con->query($sql);
            $rows=$result->num_rows;
            if($rows>=1){
                while($data=$result->fetch_assoc()){
                    
                }
            }
            echo"<br><br>";
        ?>
        <p style='float:right'>sss</p>
        <p style='float:left'>sss</p>
        <input type="text" name="message" class='form-control'>
        <input type="submit" name='send' value="Send" class='btn btn-warning'>
    </form>
</body>
</html>

<?php
    if(isset($_POST['send'])){
        $message = $_POST['message'];
        $sql = "INSERT INTO `chat` (`id`, `userid`, `adminid`, `message`) VALUES (NULL, '${uid}', '1', '${message}')";
        $con->query($sql);
    }
?>