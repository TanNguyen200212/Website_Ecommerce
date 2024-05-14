<?php require_once 'inc/header.php';
    $value = contact();


?>
<?php require_once 'inc/nav.php'; ?>

<div class="container-fluid">

    <div div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Contact</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Contact ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>

                        </tr>

                        <!-- <tbody> -->
                        <tr>
                            <?php


                                                while($row = mysqli_fetch_assoc($value))
                                                {
                                                    ?>
                            <td> <?php echo $row['contact_id']?> </td>
                            <td> <?php echo $row['name']?> </td>
                            <td> <?php echo $row['email']?> </td>
                            <td> <?php echo $row['subject'] ?> </td>
                            <td> <?php echo $row['message'] ?> </td>


                            <td class="text-center">


                                <a href="del_con.php?id=<?php echo $row['contact_id'] ?>" class="btn btn-danger btn-sm">
                                    Delete</a>

                            </td>
                        </tr>
                        <?php
                                                }

                                        ?>
                    </thead>
                    <!-- </tbody>      -->

                </table>
            </div>
        </div>
    </div>

</div>
<?php require_once 'inc/footer.php'; ?>