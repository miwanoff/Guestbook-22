<?php
include_once "dbconnect.php";
if (!isset($_SESSION)) {
    session_start();
}

function out($count)
{
    global $conn;
    $arr_out = [];
    try {
        if (!$result = $conn->query("SELECT * FROM `gbooktable`")) {
            throw new Exception('Error selection from table  GBookTable: [' . $conn->error . ']');
        }
        while ($row = $result->fetch_assoc()) {
            $arr_out[] = $row;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $arr_out;
}

function check_autorize($log, $pas) {
	global $conn; 
	$sql = "SELECT log FROM Users WHERE log = '" . $log . "' AND pas='" . $pas . "';";
	
	if ($result = $conn->query($sql)) {
		$n = $result->num_rows; 
		if ($n != 0) {
			$_SESSION ['user_login'] = $log; 
			return true;
		}
		else {
			return false;
		}
	}
}

function logout() { 
	unset($_SESSION ['user_login']);
	session_unset();
	header("Location: index.php");
}

if (isset($_REQUEST ['action'])) { 
	$action = $_REQUEST ['action'];
	switch ($action) {		
		case 'logout' :
			logout();
			break; 
		default :
			header("Location: index.php"); 
	}
}