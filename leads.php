<?php
include './db.php';
require 'PHPMailer-master/PHPMailerAutoload.php';


$name=$_POST['fullname'];
$email=$_POST['email'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];


$sql= "INSERT INTO articulate_contact (name,email,phonenumber,gender,age)
	 VALUES ('$name','$email','$phone','$gender',$age)";
	 
	 if (mysqli_query($conn, $sql)) {
		$mailto = $email;
		   $mailSub = "Alert";
		   $mailMsg = "New enroll created ads";
		  
		   $mail = new PHPMailer();
		   $mail ->IsSmtp();
		   $mail ->SMTPDebug = 0;
		   $mail ->SMTPAuth = true;
		   $mail ->SMTPSecure = 'ssl';
		   $mail ->Host = "smtp.gmail.com";
		   $mail ->Port =  465;
		   // $mail ->IsHTML(true);
		   $mail ->Username = "gowdayash7@gmail.com";
		   $mail ->Password = "yashwanth cool";
		   $mail ->SetFrom("gowdayash7@gmail.com");
		   $mail ->Subject = $mailSub;
		   $mail ->Body = $mailMsg;
		   $mail ->AddAddress($mailto);

		   if(!$mail->Send()){
		       echo "Mail Not Sent";
		   }else{
		       echo "Mail Sent";
		   }
	} else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	 }
	 
?>