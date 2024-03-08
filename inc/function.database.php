<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

/**
 * Localhost = Host Server
 * Root = User DB
 * Empty or Null = Password DB
 * db_bkkmahardhika = Database Name
 */
$conn = new mysqli('localhost', 'root', '', 'db_bkkmahardhika');

if ($conn->connect_error) {
    die('Mysql Connect Error: ' . $conn->connect_error);
}
