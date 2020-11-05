<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="afaq.css" />
    <script src="main.js"></script>
</head>
<body>
<div class="form-group">
                <table style="border-collapse: collapse;
    width: 100%;
    background: beige;
    font-family: monospace;
    font-size: 20px;
    text-align: left;">
                <tr style="background-color:yellow;background-size:cover;">
                    <th>ID</th>
                    <th>NAME&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>EMAIL&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>QUESTION</th>
                </tr>

                <?php
                $con=mysqli_connect("localhost","root","","bloodbank");
                if($con->connect_error){
                    die("conection failed: ".$con->connect_error);
                }

                $sql="select id,name,email,question from faq";
                $result=$con->query($sql);

                if($result->num_rows>0){
                    
                    while($row=$result->fetch_assoc()){
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["question"]."</td><td></tr>";
                    }
                    echo "</table>";
                }

                else{
                    echo "You have no Questions yet";
                }
                $con->close();
            
                ?>
                <br>
                <center>
                <div style="width:100%;background-color:black;">
                <label style="font-size:30px;color:white;">Answer Section</label>
                </div>
                <br>
    <div class="answer_faq" style="border:3px solid black;">
        
    <form action="test.php" method="post" class ="form2">
    <label style="width:150px;">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select name="mail_to" style="width:200px;height:50px;">
    <?php 
    $con=mysqli_connect("localhost","root","","bloodbank");
               $res = mysqli_query($con,"select email from faq");
               while($row=mysqli_fetch_array($res))
             {
                ?>
            <option><?php echo $row["email"]; ?></option>
            <?php
            }
            ?>

</select>
    <br><br>
    <label>Answer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="mail_msg" class="faqq" placeholder="write your answer here" required>
    <br>
    
    
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Sent Mail" class="submit" name="submit_faq">
    </form>
    </div>
            </center>
            </div>   
               
              
            </div>

           


            <?php

if(isset($_POST['submit_faq'])){
    $mailto = "marufalaslam@gmail.com";
    $mailSub = "Reply from Admin,SBB";
    $mailMsg = $_POST['mail_msg'];
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
<?php 
if(isset($_POST['submit_faq'])){
    $con=new mysqli("localhost","root","","bloodbank");
   $ssq="delete from faq where email='$mailto'";

   $var=mysqli_query($con,$ssq);
}
?>

</body>
</html>