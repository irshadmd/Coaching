<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
    .myprofile {
        padding: 2%;
        background-color: white;
        border-radius: 10px;
        padding: 3%;
    }

    input:active {
        border: 1px solid black;
    }

    input {
        border: 1px solid black;
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
                    Uploaded Videos
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"> Uploaded videos</li>
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
                            <div class="row">
                                <?php
                                $class = $_GET['class'];
                                $cat = $_GET['cat'];
                                $subcat = $_GET['id'];

                                $sql = "SELECT * FROM videos WHERE class='$class' AND category='$cat' AND subcategory='$subcat'";
                                $query = $conn->query($sql);
                                if ($query->num_rows > 0) {
                                    while ($row = $query->fetch_assoc()) {

                                ?>
                                        <div class="col-md-4">
                                            <video src="./uploads/videos/<?php echo $row['video_file']; ?>" width="100%" height="200" controls type="video/mp4"></video>
                                            <h3><?php echo $row['video_descp']; ?></h3>
                                            <h4><?php echo 'Upload date: ' . $row['date']; ?></h4>
                                            <a href="deletevideo.php?id=<?php echo $_GET['id']; ?>&cat=<?php echo $_GET['cat']; ?>&class=<?php echo $_GET['class']; ?>&videoid=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "<p>No Videos uploaded! </p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>
</body>

</html>