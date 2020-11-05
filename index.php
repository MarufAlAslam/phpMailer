<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- google fonts css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- style css -->
    <link href="style.css" rel="stylesheet">
    <title>Php Mailer</title>
  </head>
  <body>
    <div class="container mt-2">
        <div class="">
            <h1 class="text-center mb-5">Php Mailer Sample</h1>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="index.php" method="post">
                        <!-- name -->
                        <label for="name" class="text-left">Name</label>
                        <input type="text" id="name" name="name" placeholder="your name here..." class="form-control" required>

                        <!-- email address -->
                        <label for="email" class="text-left mt-3">Email addrress</label>
                        <input type="text" id="email" name="email" placeholder="your email here..." class="form-control" required>

                        <!-- message -->
                        <label for="message" class="text-left mt-3">Message</label>
                        <textarea name="message" id="message" class="form-control" placeholder="your message here..." cols="30" rows="10"></textarea>

                        <!-- submit button -->
                        <div class="text-center">
                            <input type="submit" name="submit" id="submit" class="btn btn-success mt-4 text-uppercase px-4 py-2" value="Send Mail">
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->


    <!-- php section -->
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
                echo '<script language="javascript">';
                echo 'alert("Mail Not Sent")';
                echo '</script>';
            }
            else
            {  
                echo '<script language="javascript">';
                echo 'alert("Mail Successfully Sent")';
                echo '</script>';
            }  
    }
?>

  </body>
</html>