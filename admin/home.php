<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <div class="row">
          <?php
          $sql = "SELECT * FROM classes";
          $query = $conn->query($sql);
          if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {

          ?>
              <div class="col-lg-3 col-xs-12 col-sm-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <?php
                    echo "<h3>" . $row['class_name'] . "</h3>";
                    ?>
                    <p>Class</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                  <a href="openclass.php?id=<?php echo $row['class_name']; ?>" class="small-box-footer">Open Class <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

          <?php
            }
          } else {
            echo "<p>no class created</p>";
          }
          ?>



        </div>
        <!-- /.row -->
    </div>
    <?php include 'includes/footer.php'; ?>
    </section>
  </div>
  </div>
  <?php include 'includes/scripts.php'; ?>
</body>

</html>