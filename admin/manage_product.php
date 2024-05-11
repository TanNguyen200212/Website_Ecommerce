<?php require_once 'inc/header.php';
    // active_status();
    active_status_product(); 
    $value =view_product();


?>
<?php require_once 'inc/nav.php'; ?>

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Manage Product </h6>
                        <!-- <a href="">Show All</a> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id ="dataTable" cellspacing="0" with ="100%">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Img</th>
                                    <th scope="col">MRP</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="3" class="text-center">Opeartions</th>
                                </tr>
                                <tr>
                                <?php  
                                while ($row =mysqli_fetch_assoc($value))
                                {
                                    ?>
                                    <td><?php echo $row['p_id']; ?></td>
                                    <td><?php echo $row['cat_name']; ?></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><img src="img/<?php echo $row['img']?>" width="100px" height="100px"  class="img-circle"></td>
                                    <td><?php echo $row['MRP']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    
                                    <td>
                                        <?php 
                                        if($row['status'] =='1'){
                                            echo "Active";
                                        }else{
                                            echo "Deactive";
                                        }
                                        ?>
                                    </td>

                                    <td class="text-center">
                                    <?php 
                                    if($row['status'] =='1'){
                                        echo "<a href ='manage_product.php?opr=deactive&id=".$row['p_id']."' class='btn btn-danger'> Deactive</a>";
                                    }else{
                                        echo "<a href ='manage_product.php?opr=active&id=".$row['p_id']."' class='btn btn-success'> Active</a>";
                                    }
                                    ?>
                                
                                    <a href="edit_product.php?id=<?php echo $row['p_id']?>" class="btn btn-primary btn-sm ">Edit</a>
                                    
                                    </td>
                                
                            
                                </tr>
                                <?php
                                } 
                                ?>
                            
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            <!-- footer -->
<?php require_once 'inc/footer.php'; ?>









