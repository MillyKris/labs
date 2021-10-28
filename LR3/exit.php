<?php 
require_once("userLogic.php");
	if(isset($_SESSION['USER-ID'])){
		unset($_SESSION['USER-ID']);
	}
	header(header: 'Location:web-applications.php');