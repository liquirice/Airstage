<?php  

$to="liquirice@gmail.com";
$subject="This is header";
$message="This is body";
$headers = "From:airstage";

if(mail($to,$subject,$message,$headers)){
	echo "Successful";
}
else{
	echo "Fail";
}
?>
 
