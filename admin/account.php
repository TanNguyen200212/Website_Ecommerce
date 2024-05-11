<?php require_once 'inc/header.php';
    active_status_user();
    $value =view_user();

?>
<?php require_once 'inc/nav.php'; ?>

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Account user </h6>
                        <!-- <a href="">Show All</a> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id ="dataTable" cellspacing="0" with ="100%">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="3" class="text-center">Opeartions</th>
                                </tr>
                                <tr>
                                <?php  
                                while ($row =mysqli_fetch_assoc($value))
                                {
                                    ?>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['password']; ?></td>

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
                                        echo "<a href ='account.php?opr=deactive&id=".$row['id']."' class='btn btn-danger'> Deactive</a>";
                                    }else{
                                        echo "<a href ='account.php?opr=active&id=".$row['id']."' class='btn btn-success'> Active</a>";
                                    }
                                    ?>
                                
                                    
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