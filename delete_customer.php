<?php 
include ('koneksi.php'); 

$status = '';
$result = '';

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['customerNumber'])) {
        //query SQL
        $cust_del = $_GET['customerNumber'];
        $query = "DELETE FROM customers WHERE customerNumber = '$cust_del'"; 

        //eksekusi query
        $result = mysqli_query($koneksi,$query);

        if ($result) {
            $status = 'dok';
        }
        else{
            $status = 'derr';
        }

        //redirect ke halaman lain
        header('Location: index.php?status='.$status);
    }  
}