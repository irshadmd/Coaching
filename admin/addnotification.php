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
                    Add Announcement
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class=""> <?php echo $_GET['class']; ?></li>
                    <li class=""> <?php echo $_GET['cat']; ?></li>
                    <li class="active"> Add Announcement</li>
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
                            <form method="POST" action="addnotification_data.php?class=<?php echo $_GET['class']; ?>&cat=<?php echo $_GET['cat']; ?>" name="addnotification">
                                <div class="form-group row">
                                    <label for="message" class="col-md-4 col-form-label text-md-right">Enter Message </label>
                                    <div class="col-md-6">
                                        <textarea id="message" class="form-control" name="message" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat" name="addnotification"><i class="fa fa-check-square-o"></i> Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="myprofile">
                            <h4>Added Announcements</h4>
                            <?php
                            $class = $_GET['class'];
                            $cat = $_GET['cat'];
                            $sql = "SELECT * FROM notification WHERE class='$class' AND category='$cat'";
                            $query = $conn->query($sql);
                            if ($query->num_rows > 0) {
                            ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>S no.</th>
                                            <th>Message</th>
                                            <th>Added Date</th>
                                        </thead>
                                        <?php
                                        $count = 1;
                                        $sql = "SELECT * FROM notification WHERE class='$class' AND category='$cat'";
                                        $query = $conn->query($sql);
                                        if ($query->num_rows > 0) {
                                            while ($row = $query->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row['announcement'] ?></td>
                                                    <td>
                                                        <?php echo $row['date'] ?>
                                                        &nbsp;
                                                        <a href="delete_notification.php?id=<?php echo $row['id']; ?>&class=<?php echo $class; ?>&cat=<?php echo $cat; ?>" class="btn btn-danger" style="border-radius: 18px;"><i class="fa fa-warning"></i> &nbsp Delete</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <tbody>
                                    </table>
                                </div>
                            <?php
                            } else {
                                echo "No Announcements.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>