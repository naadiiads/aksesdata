<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pemrograman Web</title>
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
            <?php 
                //mengecek apakah proses update dan delete sukses/gagal
                if (@$_GET['status']!==NULL) {
                    $status = $_GET['status'];
                    if ($status=='ok') {
                        echo '<br><br><div class="alert alert-success" role="alert">Data customer has been updated</div>';
                    }
                    elseif($status=='err'){
                        echo '<br><br><div class="alert alert-danger" role="alert">Unable to deleted data customer</div>';
                    }
                }
            ?>
            <h2 style="margin: 30px 0 30px 0;">Customers</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Customer Number</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM customers";
                        $result = mysqli_query($koneksi,$query);
                        ?>

                        <?php while($data = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><?php echo $data['customerNumber'];  ?></td>
                            <td><?php echo $data['customerName'];  ?></td>
                            <td><?php echo $data['phone'];  ?></td>
                            <td><?php echo $data['city'];  ?></td>
                            <td>
                            <a href="<?php echo "update_customer.php?customerNumber=".$data['customerNumber']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                            &nbsp;&nbsp;
                            <a href="<?php echo "delete_customer.php?customerNumber=".$data['customerNumber']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

            <h2 style="margin: 30px 0 30px 0;">Products</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM products";
                        $product = mysqli_query($koneksi,$query);
                        ?>

                        <?php while($item = mysqli_fetch_array($product)): ?>
                        <tr>
                            <td><?php echo $item['productCode'];  ?></td>
                            <td><?php echo $item['productName'];  ?></td>
                            <td><?php echo $item['quantityInStock'];  ?></td>
                            <td><?php echo $item['buyPrice'];  ?></td>
                            <td>
                            <a href="update_product.php?productCode=<?php echo $item['productCode']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                            &nbsp;&nbsp;
                            <a href="delete_product.php?productCode=<?php echo $item['productCode']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

        </main>
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>

