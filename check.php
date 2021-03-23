<?php
$_name=$_POST['_name'];
$_surname=$_POST['_surname'];
$_sex=$_POST['_sex'];
$_tel=$_POST['_tel'];
$_email=$_POST['_email'];
$_bd=$_POST['_bd'];

$filename=$_name." ".$_surname." ".$_tel.".txt"; 
$errormess = ""; 

if (strlen($_name)==0) {$errormess = "Имя не заполнено\r\n";} 
else if(!preg_match("/^[а-яА-Я]+$/iu",$_name)) {$errormess = "Имя заполнено не верно\r\n";}

if (strlen($_surname)==0) {$errormess = $errormess."Фамилия не заполнено\r\n";} 
else if(!preg_match("/^[а-яА-Я]+$/iu",$_surname)) {$errormess = $errormess."Фамилия заполнено не верно\r\n";}

if (strlen($_tel)==0) {$errormess = $errormess."Телефон не заполнено\r\n";}
else if (strlen($_tel)<11 or strlen($_tel)>12 ){$errormess = $errormess."Телефон заполнено не верно\r\n";}


if (strlen($_email)==0) {$errormess = $errormess."Email не заполнено\r\n";}
else if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {$errormess = $errormess."Email заполнено не верно\r\n";}

if (strlen($errormess)==0) {
$fd = fopen($filename, 'w') or die("не удалось создать файл");
$str = "Имя - ".$_name."\r\n";
fputs($fd, $str);
echo $str;
echo "<br>";
$str = "Фамилия - ".$_surname."\r\n";
fputs($fd, $str);
echo $str;
echo "<br>";
if ($_sex=="m") {$_sex="муж.";} else {$_sex="жен.";}
$str = "Пол - ".$_sex."\r\n";
fputs($fd, $str);
echo $str;
echo "<br>";
$str = "Телефон - ".$_tel."\r\n";
fputs($fd, $str);
echo $str;
echo "<br>";
$str = "E-mail - ".$_email."\r\n";
fputs($fd, $str);
echo $str;
echo "<br>";
$str = "Дата рождения - ".$_bd."\r\n";
fputs($fd, $str);
echo $str;
echo "<br>";
fclose($fd);
}

else
	

	{
		session_start();
		  $_SESSION['mes'] =  $errormess;
require('index.html');	
		
	}



?>