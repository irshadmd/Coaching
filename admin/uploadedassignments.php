<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
    .myprofile {
        padding: 2%;
        background-color: white;
        border-radius: 10px;
        padding: 3%;
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
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>S.No</th>
                                        <th>Assignment Description</th>
                                        <th>Assignment File</th>
                                        <th>Upload Date</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $class = $_GET['class'];
                                        $cat = $_GET['cat'];
                                        $subcat = $_GET['id'];

                                        $count = 1;

                                        $sql = "SELECT * FROM assignments WHERE class='$class' AND category='$cat' AND subcategory='$subcat'";
                                        $query = $conn->query($sql);
                                        if ($query->num_rows > 0) {
                                            while ($row = $query->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row['assignment_descp']; ?></td>
                                                    <td><a href="./uploads/assignments/<?php echo $row['assign_file']; ?>" target="_blank">Click</a></td>
                                                    <td><?php echo $row['date']; ?>
                                                        <a href="deleteassignment.php?id=<?php echo $_GET['id']; ?>&cat=<?php echo $_GET['cat']; ?>&class=<?php echo $_GET['class']; ?>&assignid=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<p>No Assignments uploaded! </p>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
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