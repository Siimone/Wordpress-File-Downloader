<?php
    require_once("./wp-load.php");
	
	$filenames = ["Example 1", "Example 2", "Example 3"];
	$path = '../Files/';
	$prefix = 'filename-';
	$param = isset($_GET['id']) ? (int)$_GET['id'] : -1;
	
	function goToHomePage() {
		header("Location: https://www.example.org/");
		die();
	}
	
	if(is_user_logged_in())
		if($param != -1) {
			$filename = $prefix . $param . ".pdf";
			$download_file = $path . $filename;
			if(!empty($filename))
				if(file_exists($download_file)){
					header('Content-Disposition: attachment; filename=' . $filenames[$param - 1] . ".pdf");
					header('Content-Type: application/pdf');
					readfile($download_file); 
					exit;
				}else
					goToHomePage();
			else
				goToHomePage();
		}else
			goToHomePage();
    else
		goToHomePage();
