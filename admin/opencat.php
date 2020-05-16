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
                    <?php
                    $catname = $_GET['id'];
                    $class = $_GET['class'];
                    $newclass = str_replace(' ', '', $class);
                    $sql = "SELECT * FROM $newclass WHERE category='$catname'";
                    $query = $conn->query($sql);
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                            $sub_cat = $row['subcategory'];
                            $subcat_arr = explode("_", $sub_cat); //spliting subcategory
                            $subcat_trimarr = array_filter($subcat_arr); //removing white space
                            foreach ($subcat_trimarr as $sub) {

                    ?>
                                <div class="col-lg-3 col-xs-12 col-sm-6">
                                    <!-- small box -->
                                    <div class="small-box bg-blue">
                                        <div class="inner">
                                            <?php
                                            echo "<h3>" . $sub . "</h3>";
                                            ?>
                                            <p>Subcategory</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-stalker"></i>
                                        </div>
                                        <a href="addtasks.php?id=<?php echo $sub; ?>&cat=<?php echo $catname; ?>&class=<?php echo $class; ?>" class="small-box-footer">open <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                    <?php
                            } //foreach
                        } //whileloop
                    } else {
                        echo "<p>no subcategory</p>";
                    }
                    ?>
                    <br>
                    <hr>
                </div>
                <!-- /.row -->
                <a href="doubts.php?class=<?php echo $class; ?>&cat=<?php echo $catname; ?>" class="btn btn-github btn-block"> View Doubts</a>
                <a href="viewstudents.php?class=<?php echo $class; ?>&cat=<?php echo $catname; ?>" class="btn btn-google btn-block"> View Students</a>

        </div>
        <?php include 'includes/footer.php'; ?>
        </section>
    </div>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>