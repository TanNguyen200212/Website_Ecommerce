<?php require_once 'inc/header.php';
    active_status();
    $value =view_cat();

?>
<?php require_once 'inc/nav.php'; ?>

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Manage Category </h6>
                        <!-- <a href="">Show All</a> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id ="dataTable" cellspacing="0" with ="100%">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="3" class="text-center">Opeartions</th>
                                </tr>
                                <tr>
                                <?php  
                                while ($row =mysqli_fetch_assoc($value))
                                {
                                    ?>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['cat_name']; ?></td>
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
                                        echo "<a href ='manage_category.php?opr=deactive&id=".$row['id']."' class='btn btn-success'> Deactive</a>";
                                    }else{
                                        echo "<a href ='manage_category.php?opr=active&id=".$row['id']."' class='btn btn-success'> Active</a>";
                                    }
                                    ?>
                                
                                    <a href="edit_cat.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-sm ">Edit</a>
                                    <a href="del_cat.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
                                    
                                    </td>
                            
                                </tr>
                                <?php
                                } 
                                ?>
                            
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->