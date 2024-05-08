<?php
session_start(); 
require_once '../functions/db.php';
require_once '../functions/functions.php';   

if (isset($_SERVER['REQUEST_METHOD'])  == 'POST') {
$qty = safe_value($con, $_POST['Qty']);
$pid = safe_value($con, $_POST['P_ID']);
$type = safe_value($con, $_POST['type']);

    if ($type == 'add') 
    {
    add_cart($pid, $qty);
    }
    echo total_cart_value();
}
