<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

$conn = new mysqli('localhost', 'root', '', 'db_bkkmahardhika');

if ($conn->connect_error) {
    die('Mysql Connect Error: ' . $conn->connect_error);
}
