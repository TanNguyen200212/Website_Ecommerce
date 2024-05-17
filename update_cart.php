<?php 
session_start();
$idsp = $_GET['pid'];
$new_quantity = $_GET['quantity'];
if (!is_numeric($new_quantity) || $new_quantity <= 0) {
    header("Location: cart.php?error=invalid_quantity");
    exit();
}

if (isset($_SESSION['CART'])) {
    $cart = $_SESSION['CART'];
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['pid'] == $idsp) {
            // Update the quantity of the found product
            $cart[$i]['quantity'] = $new_quantity;
            break;
        }
    }
}
    $_SESSION['CART'] = $cart;
    


?>
