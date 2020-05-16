<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
    .myprofile {
        padding: 2%;
        background-color: white;
        border-radius: 10px;
    }

    input {
        outline: 1px solid black;
        width: 80%;
    }

    textarea {
        width: 80%;
        padding: 1%;
        outline: 1px solid black;
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
                    Doubt Reply
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active"> Doubt Reply</li>
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
                            <p>Replying to: <b><?php echo $_GET['uname']; ?></b></p>
                            <hr>
                            <form method="POST" action="doubtanswer_data.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="ans" class="col-sm-3 control-label">Answer</label>
                                    <div class="col-sm-9">
                                        <textarea name="ans" id="ans" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="uploadedFile" class="col-sm-3 control-label">Answer Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="uploadedFile" id="uploadedFile" accept="image/*">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat" name="doubtanswer"><i class="fa fa-check-square-o"></i> Submit</button>
                            </form>
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