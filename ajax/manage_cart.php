<?php
session_start(); 
require_once '../functions/db.php';
require_once '../functions/functions.php';   

if (isset($_SERVER['REQUEST_METHOD'])  == 'POST') {
    if (isset($_POST['p_id']) && isset($_POST['p_name']) && isset($_POST['price'])&& isset($_POST['Qty']) && isset($_POST['type'])) {
    $pid = safe_value($con, $_POST['p_id']);
    $pname = safe_value($con, $_POST['p_name']);
    $price= safe_value($con, $_POST['price']);
    $qty = safe_value($con, $_POST['Qty']);
    $type = safe_value($con, $_POST['type']);

    if ($type == 'add') 
    {
    add_cart($pid,$pname,$price,$qty);
    }
    echo total_cart_value();
}
}

    