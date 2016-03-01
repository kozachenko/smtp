<?php
	include __DIR__.'/lime/smtp.php';
	use Lime\SMTP;
	namespace chili;
	$host='';
	$port=25;
	$secure=true;
	$login='';
	$password='';

	class Mail{
		function send($to, $subject, $body){
			global $host, $port, $secure, $login, $password;
			$smtp=new Lime\SMTP($host, $port, $secure);
			$smtp->auth($login, $password);
			$smtp->send($to, $subject, $body);
		}
	}