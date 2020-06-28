<?php
    session_start();
    require_once('./include/config.php');
    $uid = $_GET['uid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../users/assets/css/bootstrap.css">
    <title>Chats</title>
</head>
<body class="container">
    <a href="./complaint-details.php" class="btn btn-primary">Back</a>
    <form method="post">
        <?php
            $sql = "SELECT * FROM `chat` WHERE `userid`='${uid}'";
            $result = $con->query($sql);
            $rows=$result->num_rows;
            if($rows>=1){
                while($data=$result->fetch_assoc()){
                    $message = $data['message'];
                    $sender = $data['sender'];
                    $myId;
                    echo"<br><br>";
                    if($sender == 'a')
                        echo "<p style='float:right'>${message}</p>";
                    else
                        echo "<p style='float:left'>${message}</p>";
                }
            }
        ?>
        <br><br>
        <input type="text" name="message" class='form-control'>
        <input type="submit" name='send' value="Send" class='btn btn-warning'>
    </form>
</body>
</html>

<?php
    if(isset($_POST['send'])){
        $message = $_POST['message'];
        $sql = "INSERT INTO `chat` (`id`, `userid`, `adminid`, `message`, `sender`) VALUES (NULL, '${uid}', '1', '${message}', 's')";
        $con->query($sql);
        header('location:./chat.php');
    }
?>