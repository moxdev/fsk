<?php

//session_start();
include 'akismet.class.php';

if(!$_POST) {
	echo 'This page cannot be accessed directly.';
	exit();
}
	
// HIDDEN HONEYPOT
$spa = $_POST["spam"];
	
if (!empty($spa) && !($spa == "7" || $spa == "seven")) {
	echo "We're sorry, but you appear to be a spambot";
    exit ();
}
	
if($_SERVER['REQUEST_METHOD']=="POST") {
	$WordPressAPIKey = 'c32918c5e5bc';
	$MyBlogURL = 'http://www.mm4solutions.com/';
	
	$recipients=$_POST["recipients"];
	$to = str_replace("_AT_","@",$recipients);
	//$to='chris@mm4solutions.com';
	
	$first_name=strip_tags($_POST["contact-first-name"]);
	$last_name=strip_tags($_POST["contact-last-name"]);
	$email=strip_tags($_POST["contact-email"]);
	$phone=$_POST["contact-phone"];
	$date=$_POST["contact-move-date"];
	$hear=strip_tags($_POST["contact-how-hear"]);
	$comments=strip_tags($_POST["contact-comments"]);
	$sbjct=strip_tags($_POST["subject"]);
	
	$comment = array(
		'author' => $first_name,
		'email' => $email,
		'website' => $MyBlogURL,
		'body' => $comments
	);
	 
	$akismet = new Akismet($MyBlogURL, $WordPressAPIKey, $comment);
	
	$from="do-not-reply@mm4solutions.com";
	$subject=$sbjct;
	$message="First Name: " . $first_name . "<br>" . "Last Name: " . $last_name . "<br>" . "Email: " . $email . "<br>" . "Phone: " . $phone . "<br>" . "Desired Move-In Date: " . $date . "<br>" . "How Did You Hear About Us: " . $hear . "<br>" . "Comments: " . $comments;
	$header='From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charser=iso-8859-1'."\r\n".'X-Mailer: PHP/'.phpversion();
	
	if ($akismet->isSpam()) {
		//-- THIS IS SPAM, YO!!!!!
		echo "We're sorry, but you appear to be a spambot";
		exit();
	} else {
		@mail($to,$subject,$message,$header);
	}
}
?>