<?php

require_once 'inc/header.php';

if(isset($_GET['id']))
    {
        $del_id = $_GET['id'];
        $query = " DELETE FROM contact WHERE contact_id='$del_id'";
        $result = mysqli_query($con,$query);
    
        if($result)
        {
            header("location:contact.php");
        }
    }

?>
<?php require_once 'inc/footer.php'; ?>