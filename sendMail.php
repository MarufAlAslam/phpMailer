<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    






<?php
$address = $_POST['email'];
$message = $_POST['message'];
    if(isset($_POST['submit'])){
        $mailto = $address;
        $mailSub = "MAIL FROM ADMIN";
        $mailMsg = $message;
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = "smtp.gmail.com";
        $mail ->Port = 465; // or 587
        $mail ->IsHTML(true);
        $mail ->Username = "marufhussain688@gmail.com";
        $mail ->Password = "Maruf&orna";
        $mail ->SetFrom("Admin@info.com");
        $mail ->Subject = $mailSub;
        $mail ->Body = $mailMsg;
        $mail ->AddAddress($mailto);
        if(!$mail->Send())
            {
                // echo '<script language="javascript">';
                // echo 'alert("Mail Not Sent")';
                // echo '</script>';
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Mail not sent..';
                echo '</div>';
            }
            else
            {  
                // echo '<script language="javascript">';
                // echo 'alert("Mail Successfully Sent")';
                // echo '</script>';

                // header('Location:index.php');
                echo '<div class="container">';
                echo '<div class="alert alert-success text-center mt-5" role="alert">';
                echo 'Mail sent Successfully..';
                echo '</div>';
                echo '</div>';

                
            }  
    }
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>