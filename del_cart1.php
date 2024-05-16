
<?php
session_start();
$idsp = $_GET['pid'];
if (isset($_SESSION['CART'])) {
    $cart = $_SESSION['CART'];
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['pid'] == $idsp) {
            array_splice($cart, $i, 1);
            break;
        }
    }
}
    $_SESSION['CART'] = $cart;
    header("Location: cart.php");
    exit();
        

//update session
// $_SESSION['cart'] = $cart;

header("Location: cart.php");
?>
