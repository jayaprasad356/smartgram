<?php
//session_save_path("../temp");
	session_start();	
	unset($_SESSION['doctor_name']);
	unset($_SESSION['doctor_id']);
	//unset($_SESSION['timeout']);
	header("location:index.php");
