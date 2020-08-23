<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$defaults='siddharthmani2000@gmail.com';
// send email
mail("siddharthmani2000@gmail.com","My subject",$msg);
	// ,'-f'.$defaults);
?>