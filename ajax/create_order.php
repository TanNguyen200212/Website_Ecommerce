<!-- POST TO CREATE ORDER -->
<?php
session_start();
require_once '../functions/db.php';

if (isset($_SERVER['REQUEST_METHOD'])  == 'POST') {
    $user_id = $_SESSION['USER_ID'];
    $db_user_id = (int)$user_id;
    $query = "INSERT INTO `orders`( `user_id`, `order_status`, `created_at`, `updated_at`) VALUES ($db_user_id,0,now(),NULL)";
    $result = mysqli_query($con, $query);


    $query1 = "SELECT id FROM orders WHERE user_id = $db_user_id ORDER BY id DESC LIMIT 1";

    $result1 = mysqli_query($con, $query1);
if ($result1) {
    $row = mysqli_fetch_assoc($result1);
    echo $row['id'];
    $_SESSION['ORDER_ID'] = $row['id'];
    $id = (int)$_SESSION['ORDER_ID'];
    
    // Redirect to order.php with the ORDER_ID
    header('Location: ./order.php?id='.$_SESSION['ORDER_ID']);
    return $id;
} else {
    // Handle the error, if any
    echo "Error: " . mysqli_error($con);
}
}
?>
<!-- GET TO RETRIEVE LATEST ORDER_ID BY CURRNET USER -->