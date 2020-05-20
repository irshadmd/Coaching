<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
    .mybox {
        padding: 2%;
        background-color: white;
        border-radius: 10px;
    }

    .msg {
        align-items: flex-end;
        margin-bottom: 10px;
        border: 1px solid black;
        border-radius: 10px;
        overflow: hidden;
    }

    .msg-img {
        width: 50px;
        height: 50px;
        margin-right: 5px;
        background: #ddd;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-radius: 50%;
    }

    .msg-bubble {
        max-width: 450px;
        padding: 10px;
        border-radius: 15px;
    }

    .msg-info {
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .msg-info-name {
        margin-right: 10px;
        font-weight: bold;
    }

    .msg-info-time {
        font-size: 0.85em;
    }

    .left-msg .msg-bubble {
        border-bottom-left-radius: 0;
    }

    .viewphoto {
        margin-top: 5px;
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
                    Doubts Section
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class=""><?php echo $_GET['class']; ?></li>
                    <li><?php echo $_GET['cat']; ?></li>
                    <li class="active">Doubts</li>
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
                    $catname = $_GET['cat'];
                    $class = $_GET['class'];
                    $sql = "SELECT * FROM messages WHERE  category='$class' AND subcategory='$catname' AND status='notresolved'";
                    $query = $conn->query($sql);
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                    ?>
                            <div class="col-md-6">
                                <div class="msg left-msg">
                                    <div class="msg-bubble">
                                        <div class="msg-info">
                                            <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>
                                            <div class="msg-info-name">
                                                <p><?php echo $row['user_id']; ?></p>
                                            </div>
                                        </div>

                                        <div class="msg-text">

                                            <div class="msg-info-time">
                                                <p><?php echo $row['sentat']; ?></p>
                                            </div>
                                            <br>
                                            <p><?php echo $row['message']; ?></p>
                                            <?php
                                            if ($row['message_image'] == null) {
                                            } else {
                                            ?>
                                                <img src="<?php echo $row['message_image']; ?>" alt="doubt image" width="60%" height="200px">
                                                <a href="<?php echo $row['message_image']; ?>" target="_blank" class="btn btn-facebook viewphoto">View Full Photo</a>
                                            <?php
                                            }
                                            ?>
                                            <?php 
                                                if($row['permission']=='disabled'){
                                            ?>
                                                    <a href="doubtenable.php?id=<?php echo $row['id'];?>" class="btn btn-success">Enable</a>
                                            <?php
                                                }else{
                                            ?>
                                                    <a href="doubtdisable.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Disable</a>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <a href="doubtanswer.php?id=<?php echo $row['id']; ?>&uname=<?php echo $row['user_id'];?>" class="btn btn-block btn-primary reply">Reply</a>
                                </div>
                            </div>
                    <?php
                        } //whileloop
                    } else {
                        echo "<p>no doubts</p>";
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