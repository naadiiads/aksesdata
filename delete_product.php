<?php 
include ('koneksi.php'); 

$status = '';
$result = '';

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['productCode'])) {
        //query SQL
        $product_del = $_GET['productCode'];
        $query = "DELETE FROM products WHERE productCode = '$product_del'"; 

        //eksekusi query
        $result = mysqli_query($koneksi,$query);

        if ($result) {
            $status = 'ok';
        }
        else{
            $status = 'err';
        }

        //redirect ke halaman lain
        header('Location: index.php?status='.$status);
    }  
}