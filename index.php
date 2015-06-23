<?php

session_start();
if(isset($_SESSION['login_status'])) {
    header('Location: home.php');
}

if(isset($_POST['captcha'])&&!empty($_POST['captcha'])){
    if($_SESSION['captcha']==$_POST['captcha']){
        $_SESSION['login_status']="loggedin";
        header('Location: home.php');
    }else{
        $flash_message = "Invalid Captcha";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Captcha</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .quote {
            font-size: 24px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="quote">
            <?php
            if(isset($flash_message)){
             echo $flash_message;
            }
            ?>
        </div>
        <div class="title">Captcha Demo</div>
        <div class="captcha">
            <img src="captcha.php" alt=""/>
        </div>
        <form action="" method="post">
            <input type="text" placeholder="captcha" name="captcha" required/> <br/>
            <input type="submit"/>
        </form>
    </div>
</div>
</body>
</html>
