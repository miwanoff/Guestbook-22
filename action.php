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