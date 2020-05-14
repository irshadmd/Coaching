<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
    .myprofile {
        padding: 2%;
        background-color: white;
        border-radius: 10px;
    }
    

</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Upload Crousel
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active"> Upload Crousel</li>
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
                    <div class="col-xs-12">
                        <div class="myprofile">
                            <form method="POST" action="uploadcrousel_data.php" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="file1" class="col-md-4 col-form-label text-md-right">Select Crousel</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="uploadedFile" id="uploadedFile" accept="image/*" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat" name="uploadCrousel"><i class="fa fa-check-square-o"></i> Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <h2>Uploaded Crousels</h2>
                <div class="row">
                    
                    <?php

                    $sql = "SELECT * FROM crousel";
                    $query = $conn->query($sql);
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {

                    ?>
                            <div class="col-md-4 crousel">
                                <img src="./uploads/crousel/<?php echo $row['img']; ?>" width="100%" height="150px" controls />
                                <h4><?php echo 'Upload date: ' . $row['date']; ?></h4>
                                <a href="deletecrousel.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p>No Crousel uploaded! </p>";
                    }
                    ?>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>