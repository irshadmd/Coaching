<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
    .myprofile {
        padding: 2%;
        background-color: white;
        border-radius: 10px;
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
                    Add Test Question
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class=""><?php echo $_GET['class']; ?></li>
                    <li class=""><?php echo $_GET['cat']; ?></li>
                    <li class=""><?php echo $_GET['id']; ?></li>
                    <li class="active"> Add Test Question</li>
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
                            <form method="POST" action="addmcq_data.php?id=<?php echo $_GET['id']; ?>&cat=<?php echo $_GET['cat']; ?>&class=<?php echo $_GET['class']; ?>" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="testype" class="col-md-4 col-form-label text-md-right">Test Type</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="testype" id="testype">
                                            <option value="testseries">Test Series</option>
                                            <option value="testmcq">MCQ Question</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row testtimediv">
                                    <div class='testtdiv'> 
                                    <label for='testtime' class='col-md-4 col-form-label text-md-right'> Test Time (<em>in minutes</em>) </label>
                                        <div class='col-md-6'>
                                            <input type='number' class='form-control' name='testtime' id='testtime' required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row testnamedrop">
                                    <label for="testname" class="col-md-4 col-form-label text-md-right">Select existing Test Series</label>
                                    <div class="col-md-6">
                                        <select name="testnamedr" id="testname" class="form-control">
                                            <?php
                                            $class = $_GET['class'];
                                            $cat = $_GET['cat'];
                                            $subcat = $_GET['id'];
                                            $sql = "SELECT DISTINCT test_name FROM mcqquestions WHERE class='$class' AND category='$cat' AND subcategory='$subcat'";
                                            $query = $conn->query($sql);
                                            if ($query->num_rows > 0) {
                                                while ($row = $query->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row['test_name']; ?>"><?php echo $row['test_name']; ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "<option>Create new test series no exsisting test series found</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row testnameinp">
                                    <label for="testnamein" class="col-md-4 col-form-label text-md-right">New Test Series name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control newt" name="testnamein" id="testnamein">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="testdescp" class="col-md-4 col-form-label text-md-right">Test Description</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="testdescp" id="testdescp">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary test">Create new test series</button>
                                <hr>
                                <div class="form-group row">
                                    <label for="heading" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;font-size: 16px;">Enter the Question (with option) And Answer</label>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="ques" class="col-md-4 col-form-label text-md-right">Question</label>
                                    <div class="col-md-6">
                                        <textarea name="question" class="form-control" id="ques" cols="30" rows="4"></textarea>
                                        <label for="image"><i class="fa fa-camera"></i></label>
                                        <input type="file" name="uploadedFile" id="uploadedFile" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row testtimediv2">

                                </div>
                                <div class="form-group row">
                                    <label for="op1" class="col-md-4 col-form-label text-md-right">Option 1</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="op1" name="op1">
                                        <label for="op1file"><i class="fa fa-camera"></i></label>
                                        <input type="file" name="op1file" id="op1file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="op2" class="col-md-4 col-form-label text-md-right">Option 2</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="op2" name="op2">
                                        <label for="op2file"><i class="fa fa-camera"></i></label>
                                        <input type="file" name="op2file" id="op2file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="op3" class="col-md-4 col-form-label text-md-right">Option 3</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="op3" name="op3">
                                        <label for="op3file"><i class="fa fa-camera"></i></label>
                                        <input type="file" name="op3file" id="op3file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="op4" class="col-md-4 col-form-label text-md-right">Option 4</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="op4" name="op4">
                                        <label for="op4file"><i class="fa fa-camera"></i></label>
                                        <input type="file" name="op4file" id="op4file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ans" class="col-md-4 col-form-label text-md-right">Correct Answer</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="ans" name="ans" required>
                                            <option value="a">(a)</option>
                                            <option value="b">(b)</option>
                                            <option value="c">(c)</option>
                                            <option value="d">(d)</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-flat" name="mcqquestions"><i class="fa fa-check-square-o"></i> Add Question</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
        $(function() {
            $(".testnamedrop").show();
            $(".testnameinp").hide();
            $(".test").click(function() {
                $(".testnamedrop").toggle();
                $(".testnameinp").toggle();

                var name = $('.test').text();
                if (name == "Create new test series") {
                    $('.test').text("Add in existing Test series");
                } else {
                    $('.test').text("Create new test series");
                }
            });

            $("#testype").change(function() {
                var selectedValue = $(this).val();
                if (selectedValue == 'testseries') {
                    $('.testtimediv').find('.testtdiv').remove();
                    $('.testtimediv2').find('.testtdiv').remove();
                    var el = "<div class='testtdiv'> <label for = 'testtime' class = 'col-md-4 col-form-label text-md-right'> Test Time (<em>in minutes</em>) </label><div class = 'col-md-6' ><input type = 'number' class = 'form-control' name = 'testtime' id = 'testtime' required></div></div>";
                    $('.testtimediv').append(el);
                } else {
                    $('.testtimediv').find('.testtdiv').remove();
                    $('.testtimediv2').find('.testtdiv').remove();
                    var el1 = "<div class='testtdiv'> <label for = 'testtime' class = 'col-md-4 col-form-label text-md-right'> Question Time (<em>in minutes</em>) </label><div class = 'col-md-6' ><input type = 'number' class = 'form-control' name = 'testtime' id = 'testtime' required></div></div>";
                    $('.testtimediv2').append(el1);
                }
            });
        });
    </script>
</body>
</html>