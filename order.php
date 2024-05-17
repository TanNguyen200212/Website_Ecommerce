<?php
require_once ('./inc/header.php');
require_once ('./inc/nav.php');

//lay id goi edit
$id = $_SESSION['ORDER_ID'];//$_GET['id'];
echo $id;
//ket noi csdl
require('./functions/db.php');

$sql = "SELECT * FROM `orders`, `order_details`, `user_register` WHERE orders.user_id = user_register.id AND orders.id = $id";
$res = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($res);

if (isset($_POST['btnUpdate'])) {
    //lay du lieu tu form
    $status = $_POST['status'];




    // cau lenh them vao bang
    $sql_str = "UPDATE `orders` 
        SET status =  '$status'
        WHERE `id`=$id
        ";



    //    echo $sql_str; exit;

    //thuc thi cau lenh
    mysqli_query($con, $sql_str);

    //tro ve trang 
    header("location: ./listorders.php");
} else {
    require('inc/header.php');
    ?>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Xem và cập nhật trạng thái đơn hàng</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="user" method="post" action="#">
                                        <div class="row">
                                            <div class="col-md-3">Khách hàng:</div>
                                            <div class="col-md-9">
                                                <?= $row['name']?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Địa chỉ:</div>
                                            <div class="col-md-9">
                                                <?= $row['address'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Số điện thoại:</div>
                                            <div class="col-md-9">
                                                <?= $row['phone_number'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Email:</div>
                                            <div class="col-md-9">
                                                <?= $row['email'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">Trạng thái đơn hàng:</div>
                                            <!-- 'Processing','Confirmed','Shipping','Delivered','Cancelled' -->
                                            <div class="col-md-9">
                                            <?= $row['order_status'] == 0 ? 'Processing' : 'Confirmed' ?>                                           
                                            </div>
                                        </div>
                                        <a href="./index.php" class="btn btn-success" name="btnUpdate" >Agree</a>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <h3>Chi tiết đơn hàng</h3>
                                    <table class="table">
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tiền</th>

                                        </tr>
                                        <?php
                                        $sql = "SELECT * FROM `orders`, `order_details`, `user_register` WHERE orders.user_id = user_register.id AND orders.id = $id";
                                        $res = mysqli_query($con, $sql);
                                        $stt = 0;
                                        $tongtien = 0;
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $tongtien += $row['qty'] * $row['price'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= ++$stt ?>
                                                </td>
                                                <td>
                                                    <?= $row['product_name'] ?>
                                                </td>
                                                <td> $
                                                    <?= number_format($row['price'], 0, '', '.') ?>
                                                </td>
                                                <td>
                                                    <?= $row['qty'] ?>
                                                </td>
                                                <td> $
                                                    <?= number_format($row['total'], 0, '', '.')  ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                    <div class="tongtien">
                                        <h5>
                                            Tổng tiền: $
                                            <?= number_format($tongtien, 0, '', '.') ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php
    require('inc/footer.php');
}
?>