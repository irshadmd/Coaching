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
                    <?php echo $_GET['id']; ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class=""><?php echo $_GET['class']; ?></li>
                    <li class=""><?php echo $_GET['cat']; ?></li>
                    <li class="active"><?php echo $_GET['id']; ?></li>
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
                    <hr>
                    <a href="addmcqquestions.php?id=<?php echo $_GET['id']; ?>&cat=<?php echo $_GET['cat']; ?>&class=<?php echo $_GET['class']; ?>" class="btn btn-block btn-facebook" style="width:80%;margin:auto;">Add MCQ Questions</a><br>
                    <a href="uploadvideo.php?id=<?php echo $_GET['id']; ?>&cat=<?php echo $_GET['cat']; ?>&class=<?php echo $_GET['class']; ?>" class="btn btn-block btn-facebook" style="width:80%;margin:auto;">Upload Video</a><br>
                    <a href="uploadassignment.php?id=<?php echo $_GET['id']; ?>&cat=<?php echo $_GET['cat']; ?>&class=<?php echo $_GET['class']; ?>" class="btn btn-block btn-facebook" style="width:80%;margin:auto;">Upload Assignment</a><br>
                </div>

                <div class="row">
                    <hr>
                    <a href="uploadedvideo.php?id=<?php echo $_GET['id']; ?>&cat=<?php echo $_GET['cat']; ?>&class=<?php echo $_GET['class']; ?>" class="btn btn-block btn-primary" style="width:80%;margin:auto;">View Uploaded Video</a><br>
                    <a href="uploadedassignments.php?id=<?php echo $_GET['id']; ?>&cat=<?php echo $_GET['cat']; ?>&class=<?php echo $_GET['class']; ?>" class="btn btn-block btn-primary" style="width:80%;margin:auto;">View Uploaded Assignment</a><br>
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