<?php
session_start(); 
require_once '../functions/db.php';
require_once '../functions/functions.php';   

if (isset($_SERVER['REQUEST_METHOD'])  == 'POST') {
    $pid = safe_value($con, $_POST['p_id']);
    $qty = safe_value($con, $_POST['Qty']);
    $type = safe_value($con, $_POST['type']);

    if ($type == 'add') 
    {
    add_cart($pid, $qty);
    }
    echo total_cart_value();
}
