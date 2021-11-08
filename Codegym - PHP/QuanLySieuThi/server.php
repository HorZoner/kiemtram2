<?php
/**
 * @var PDO
 */
$conn = new PDO('mysql:host=localhost;dbname=QuanLySieuThi', 'horzoner', 'Cuong123');
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date_current = '';
$date_current = date("Y-m-d H:i:sa");
echo $date_current;