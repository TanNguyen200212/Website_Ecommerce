<?php
include_once("db.php");
$perPage = 10;
if (isset($_POST["page"])) { 
    $page  = $_POST["page"]; 
} else { 
    $page=1; 
};  
$startFrom = ($page-1) * $perPage;  
$sqlQuery = "SELECT * FROM product ORDER BY id ASC LIMIT $startFrom, $perPage";  
$result = mysqli_query($conn, $sqlQuery); 
$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) {  
    $paginationHtml.='<tr>';  
    $paginationHtml.='<td>'.$row["id"].'</td>';
    $paginationHtml.='<td>'.$row["country"].'</td>';
    $paginationHtml.='</tr>';  
} 
$jsonData = array(
    "html"  => $paginationHtml,  
);
echo json_encode($jsonData); 
