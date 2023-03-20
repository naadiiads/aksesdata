<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include 'koneksi.php'; 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customerNumber = $_POST['customerNumber'];
      $customerName = $_POST['customerName'];
      $phone = $_POST['phone'];
      $city = $_POST['city'];
      //query SQL
      $query = "INSERT INTO customers (customerNumber, customerName, phone, city) VALUES('$customerNumber','$customerName','$phone','$city')";

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
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Form Customer</title>
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
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Customer data save successfully</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Unable to save customer data</div>';
              }
          ?>

          <h2 style="margin: 30px 0 30px 0;">Form Customer</h2>
          <form action="form_customer.php" method="POST">
            
            <div class="form-group">
              <label>Customer Number</label>
              <input type="text" class="form-control" placeholder="No" name="customerNumber" required="required">
            </div>
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" class="form-control" placeholder="Customer name" name="customerName" required="required">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" placeholder="Phone" name="phone" required="required">              
            </div>
            <div class="form-group">
              <label>City</label>
              <textarea class="form-control" placeholder="City" name="city" required="required"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>