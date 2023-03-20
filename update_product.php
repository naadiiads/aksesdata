<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('koneksi.php');

$status = '';
$result = '';

//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['productCode'])) {
        //query SQL
        $product_no = $_GET['productCode'];
        $query = "SELECT * FROM products WHERE productCode = '$product_no'";

        //eksekusi query
        $result = mysqli_query($koneksi,$query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];

    //query SQL
    $sql = "UPDATE products SET productName='$productName', quantityInStock='$quantityInStock', buyPrice='$buyPrice' WHERE productCode='$productCode'";

    //eksekusi query
    $result = mysqli_query($koneksi,$sql);
    if ($result) {
        $status = 'ok';
    }
    else{
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: index.php?status='.$status);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Product</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column" style="margin-top:100px;">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo "index.php"; ?>">Halaman depan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "form_customer.php"; ?>">Tambah Data Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "form_product.php"; ?>">Tambah Data Product</a>
                        </li>
                    </ul>
                </div>
            </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            <h2 style="margin: 30px 0 30px 0;">Update Data Product</h2>
            <form action="update_customer.php" method="POST">
                <?php while($data = mysqli_fetch_array($result)): ?>
                <div class="form-group">
                    <label>Product Code</label>
                    <input type="text" class="form-control" name="Product Code" value="<?php echo $data['productCode'];  ?>" required="required" readonly>
                </div>
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="Product Name" value="<?php echo $data['productName'];  ?>" required="required">
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control" name="quantityInStock" value="<?php echo $data['quantityInStock'];  ?>" required="required">
                </div>
                <div class="form-group">
                    <label>Buy Price</label>
                    <textarea class="form-control" name="buyPrice"><?php echo $data['buyPrice'];  ?></textarea>
                </div>
                <?php endwhile; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </main>
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
